<div>
    <form wire:submit.prevent="store" class="mb-4">
        <x-jet-input name="name" wire:model="name" type="text" placeholder="Name" class="form-control" autocomplete />
        <x-jet-input name="caption" wire:model="caption" type="text" placeholder="Caption" class="form-control" />
        <x-jet-input name="alt_text" wire:model="alt_text" type="text" placeholder="Alt Text" class="form-control" />
        <x-jet-input name="description" wire:model="description" type="text" placeholder="Description"
            class="form-control" />

        <x-jet-input x-model="fileInput" x-on:change="fileChanged" wire:model="image" type="file" placeholder="Image"
            class="form-control-file" />
        <x-jet-button type="submit">{{ __('Add Image') }}</x-jet-button>
    </form>

    {{-- <x-jet-button type="button" data-toggle="modal" data-target="#addImage">{{ __('Add Image') }}</x-jet-button> --}}

    <!-- Create Modal -->
    {{-- <div wire:ignore>
        <x-jet-dialog-modal modalId="addImage" modalLabel="addimage">
            <x-slot name="title">
                {{ __('Add Image') }}
            </x-slot>
            <div x-data="{ fileInput: '' }">
                <form wire:submit.prevent="store">
                    <x-slot name="content">
                        <x-jet-input name="name" wire:model="name" type="text" placeholder="Name"
                            class="form-control" autocomplete />
                        <x-jet-input name="caption" wire:model="caption" type="text" placeholder="Caption"
                            class="form-control" />
                        <x-jet-input name="alt_text" wire:model="alt_text" type="text" placeholder="Alt Text"
                            class="form-control" />
                        <x-jet-input name="description" wire:model="description" type="text"
                            placeholder="Description" class="form-control" />

                        <x-jet-input x-model="fileInput" x-on:change="fileChanged" wire:model="image" type="file"
                            placeholder="Image" class="form-control-file" />
                    </x-slot>
                    <x-slot name="footer">
                        <x-jet-button type="submit">{{ __('Add Image') }}</x-jet-button>
                    </x-slot>
                </form>
            </div>

        </x-jet-dialog-modal>
    </div> --}}

    <!-- Edit Modal -->
    {{-- <x-jet-dialog-modal wire:model="showEditModal">
        <x-slot name="title">
            {{ __('Edit Image') }}
        </x-slot>

        <x-slot name="content">
            <!-- Your edit form here -->
            <form wire:submit.prevent="update">
                <!-- Form fields go here -->
                <x-jet-input wire:model="name" type="text" placeholder="Name" />
                <x-jet-input wire:model="caption" type="text" placeholder="Caption" />
                <x-jet-input wire:model="alt_text" type="text" placeholder="Alt Text" />
                <x-jet-input wire:model="description" type="text" placeholder="Description" />
                <x-jet-button type="submit">{{ __('Update') }}</x-jet-button>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showEditModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal> --}}

    <!-- Your Livewire component content goes here -->
    <div class="d-flex">
        <!-- Display images and CRUD operations -->
        @foreach ($images as $image)
            <div key="{{ $image->id }}">
                <img src="{{ $image->getFirstMediaUrl('images') }}" alt="{{ $image->alt_text }}" class="img-fluid img-thumbnail" width="300" />
                <p>{{ $image->name }}</p>
                <p>{{ $image->caption }}</p>
                <p>{{ $image->description }}</p>

                <!-- Edit and Delete buttons -->
                <button wire:click="edit({{ $image->id }})">Edit</button>
                <button wire:click="delete({{ $image->id }})">Delete</button>
            </div>
        @endforeach
    </div>
</div>
