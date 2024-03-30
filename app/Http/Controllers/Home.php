<?php

namespace App\Http\Controllers;

class Home extends Controller
{
    public function index()
    {
        $client = new \Google_Client();
        $client->setDeveloperKey($_ENV['YOUTUBE_KEY']);
        $youtube = new \Google_Service_YouTube($client);
        $videos = $youtube->videos->listVideos('snippet', ['chart' => 'mostPopular', 'maxResults' => 50]);
        return view('home.index', compact('videos'));
    }

}
