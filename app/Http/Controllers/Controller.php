<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function saveVideo(Request $request) {
        // Validate the video file
        // $request->validate([
        //     'video' => 'required|mimes:mp4,mov,avi|max:20480' // Max size: 20MB
        // ]);

        // Get the original file extension
        $extension = $request->file('video')->getClientOriginalExtension();

        // Create a custom filename (e.g., "video_20240310_123456.mp4")
        $newFileName = 'vci' . '.' . $extension;

        // Store the video in the "public/videos" folder
        $videoPath = $request->file('video')->storeAs('videos', $newFileName, 'public');

        return back()->with('success', 'Video uploaded successfully! Path: ' . $videoPath);
    }
}
