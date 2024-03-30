<?php

namespace App\Http\Controllers;

class YouTubeController extends Controller
{
    public function getYouTubeVideos()
    {

        $client = new \Google_Client();
        $client->setDeveloperKey($_ENV['YOUTUBE_KEY']);


        $youtube = new \Google_Service_YouTube($client);

        $videos = $youtube->videos->listVideos('snippet', ['chart' => 'mostPopular', 'maxResults' => 50]);


        return view('youtube.index', compact('videos'));
    }

}
