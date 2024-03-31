<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_YouTube;
use Illuminate\Http\Request;

class Home extends Controller
{
    private Google_Client $client;
    private Google_Service_YouTube $service;

    public function __construct()
    {
        $this->client = new \Google_Client();
        $this->client->setDeveloperKey($_ENV['YOUTUBE_KEY']);
        $this->service = new Google_Service_YouTube($this->client);
    }

    public function index()
    {

        $videos = $this->service->videos->listVideos('snippet', ['chart' => 'mostPopular', 'maxResults' => 50]);

        return view('home.index', compact('videos'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $params = [
            'part' => 'snippet',
            'q' => $search,
            'maxResults' => 50
        ];

        $videos = $this->service->search->listSearch('snippet', $params);

        return view('home.results', compact('videos'));
    }


}
