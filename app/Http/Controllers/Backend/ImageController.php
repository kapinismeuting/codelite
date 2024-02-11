<?php

namespace App\Http\Controllers\Backend;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ImageController extends Controller
{
    public function index()
    {
        return Image::all();
    }

    public function store(Request $request)
    {
        $image = Image::create();
        $image->addMedia($request->file('file'))->toMediaCollection('images');

        return response()->json($image, 201);
    }

    public function show(Image $image)
    {
        return $image;
    }

    public function update(Request $request, Image $image)
    {
        // Handle update logic
    }

    public function destroy(Image $image)
    {
        $image->delete();
        return response()->json(null, 204);
    }
}
