<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::where('is_deleted', 0)->orderBy('id', 'desc')->get();
        return view('photos.all_photos', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'image_name' => 'required|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
        ]);

        // Save photo
        if ($request->hasFile('image_name')) {
            $imageName = time() . '.' . $request->image_name->extension();
            
            $request->image_name->move(public_path('images'), $imageName);
            Photo::create([
                'title' => $request->title,
                'image_name' => $imageName,
            ]);
        }

        return redirect()->route('photos.index')->with('success', 'Photo Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        return view('photos.show_details', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        return view('photos.edit_photo', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_name' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image_name')) {
            $imageName = time() . '.' . $request->image_name->extension();
            $request->image_name->move(public_path('images'), $imageName);
            $photo->image_name = $imageName;
        }

        $photo->title = $request->title;
        $photo->save();

        return redirect()->route('photos.index')->with('success', 'Photo Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
          if (file_exists(public_path('images/'.$photo->image_name))) {
            unlink(public_path('images/'.$photo->image_name));
        }

       

        // Option 1: Soft delete (is_deleted = 1)
        $photo->update(['is_deleted' => 1, 'updated_date' => now()]);
        
        // $photo->delete();
        return redirect()->route('photos.index')->with('success', 'Photo Deleted Successfully!');
    }
}
