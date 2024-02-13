<?php

namespace App\Http\Controllers;

use App\Models\Medias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mediaForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $userId = Auth::id();
        $media = Medias::create([
        ]);

        // Add the uploaded image to the media collection
        $media->addMediaFromRequest('image')->toMediaCollection();
        // Handle success scenario
        return redirect('/table')->with('success', 'Image uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $medias = Medias::all();
        return view('tableMedias', compact('medias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function showCards()
    {
        $medias = Medias::all();
        return view('mediaCards', compact('medias'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the media by its ID
        $media = Medias::find($id);

        if (!$media) {
            return redirect()->back()->with('error', 'Media not found.');
        }
        $media->delete();

        return redirect()->back()->with('success', 'Media deleted successfully.');
    }
}