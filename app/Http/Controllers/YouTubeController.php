<?php

namespace App\Http\Controllers;

class YouTubeController extends Controller
{
    public function getYouTubeVideos()
    {
        // Set up the Google API client
        $client = new \Google_Client();
        $client->setDeveloperKey($_ENV['YOUTUBE_KEY']); // Replace with your actual API key

        // Create a YouTube service
        $youtube = new \Google_Service_YouTube($client);

        // Example: Get trending videos
        $videos = $youtube->videos->listVideos('snippet', ['chart' => 'mostPopular', 'maxResults' => 50]);

        // Your logic to handle the $videos data
        // For example, you can pass $videos to a view


        return view('youtube.index', compact('videos'));
    }

}
