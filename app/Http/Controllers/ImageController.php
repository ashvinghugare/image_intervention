<?php

namespace App\Http\Controllers;


use App\Models\Image as ImageFile;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:4028']    
        ]);
        $filePath = 'photo/' . $request->file('image')->hashName();
        $image = Image::make($request->file('image'))->resize(368, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode('jpg', 60);
    
        Storage::disk('s3')->put($filePath, $image->stream());
    
    $request->merge([
        'name' => $filePath,
    ]);

    $user = ImageFile::create($request->only([
        'name'    
    ]));

    // return redirect('home')->with('success_message', 'Image Uploaded Successfully.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
