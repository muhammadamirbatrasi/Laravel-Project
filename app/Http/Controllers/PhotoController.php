<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Jobs;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Services\PhotoService;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::with('job')->where('is_deleted', 0)->orderBy('id', 'desc')->get();
        return view('photos.all_photos', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jobs = Jobs::where('is_deleted', 0)->get();
        return view('photos.create', compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StorePhotoRequest $request, PhotoService $service)
    {
        $service->store($request->validated(), $request->file('image_name'));

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
        $jobs = Jobs::where('is_deleted', 0)->get();
        return view('photos.edit_photo', compact('photo', 'jobs'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdatePhotoRequest $request, Photo $photo, PhotoService $service)
    {
        $service->update($photo, $request->validated(), $request->file('image_name'));

        return redirect()->route('photos.index')->with('success', 'Photo Updated Successfully!');
    }



    public function destroy(Photo $photo, PhotoService $service)
    {
        $service->delete($photo);

        return redirect()->route('photos.index')->with('success', 'Photo Deleted Successfully!');
    }
}
