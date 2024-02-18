<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('redacteur.upload_medias');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $userId = Auth::id();
        $media = Media::create();

        // Add the uploaded image to the media collection
        $media->addMediaFromRequest('image')->toMediaCollection();
        // Handle success scenario
        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the media by its ID
        $media = Media::find($id);

        if (!$media) {
            return redirect()->back()->with('error', 'Media not found.');
        }
        $media->delete();

        return redirect()->back()->with('success', 'Media deleted successfully.');
    }
    public function media(Request $request)
    {
        $user = auth()->user();
    
        // Handle the upload if the request has a file.
        if ($request->hasFile('media')) {
            $user->addMediaFromRequest('media')->toMediaCollection();
            return redirect()->route('editor.media'); // Redirect to clear the POST request and show the updated media list.
        }
    
        // Retrieve all media for the user to display on the page.
        $mediaItems = $user->media;
    
        return view('redacteur.upload_medias', compact('mediaItems'));
    }
}