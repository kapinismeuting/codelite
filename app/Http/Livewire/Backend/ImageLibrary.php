<?php

namespace App\Http\Livewire\Backend;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageLibrary extends Component
{
    use WithFileUploads;

    public $name;
    public $caption;
    public $alt_text;
    public $description;
    public $image;
    public $selectedImage;

    public function index()
    {   

        return view('backend.pages.image-library');
    }

    public function render()
    {
        $images = Image::all();

        return view('livewire.backend.image-library', compact('images'));
    }

    public function create()
    {
        $this->resetFields();
        $this->dispatchBrowserEvent('openCreateModal');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string',
            'caption' => 'nullable|string',
            'alt_text' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'required|image|max:2048', // adjust max size as needed
        ]);

        $image = Image::create([
            'name' => $this->name,
            'caption' => $this->caption,
            'alt_text' => $this->alt_text,
            'description' => $this->description,
        ]);

        $image->addMedia($this->image)->toMediaCollection('images');

        $this->resetFields();
        $this->dispatchBrowserEvent('closeCreateModal');
        $this->emit('imageAdded');
    }

    public function edit($id)
    {
        $image = Image::find($id);
        $this->selectedImage = $image;
        $this->name = $image->name;
        $this->caption = $image->caption;
        $this->alt_text = $image->alt_text;
        $this->description = $image->description;

        $this->dispatchBrowserEvent('openEditModal');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string',
            'caption' => 'nullable|string',
            'alt_text' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        if ($this->selectedImage) {
            $this->selectedImage->update([
                'name' => $this->name,
                'caption' => $this->caption,
                'alt_text' => $this->alt_text,
                'description' => $this->description,
            ]);

            $this->resetFields();
            $this->dispatchBrowserEvent('closeEditModal');
            $this->emit('imageUpdated');
        }
    }

    public function delete($id)
    {
        $image = Image::find($id);

        if ($image) {
            $image->delete();
            $this->emit('imageDeleted');
        }
    }

    private function resetFields()
    {
        $this->name = '';
        $this->caption = '';
        $this->alt_text = '';
        $this->description = '';
        $this->image = null;
        $this->selectedImage = null;
    }
}
