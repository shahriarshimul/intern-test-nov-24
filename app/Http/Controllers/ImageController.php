<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function showUploadForm()
    {
        return view('images.upload');
    }

    public function uploadImage(Request $request)
    {
        Log::info('Uploading image...');


        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            if ($file->isValid()) {
                $filePath = $file->store('images', 'public');
                Log::info('Filepath:', ['filepath' => $filePath]);

                $image = new Image();
                $image->filepath = $filePath;
                $image->save();

                return redirect()->route('images.list')->with('success', 'Image uploaded successfully!');
            } else {
                Log::error('File upload failed. The file is not valid.');
                return redirect()->back()->with('error', 'Image upload failed.');
            }
        } else {
            Log::error('No file selected for upload.');
            return redirect()->back()->with('error', 'No file selected for upload.');
        }
    }

    public function listImages()
    {
        $images = Image::all();
        return view('images.list', compact('images'));
    }

    // public function deleteImage($id)
    // {
    // $image = Image::find($id);

    // if ($image) {

    //     $imagePath = 'public/' . $image->filepath;
    //     if (Storage::exists($imagePath)) {
    //         Storage::delete($imagePath);
    //     }
    //     $image->delete();

    //     return response()->json(['success' => true]);
    // }

    // return response()->json(['success' => false, 'message' => 'Image not found.']);
    // }
}
