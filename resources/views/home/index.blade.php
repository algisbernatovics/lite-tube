<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos</title>

    <!-- Include CSS and JS files using Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">

<div class="container mx-auto p-8 bg-black">
    <h1 class="text-3xl font-bold mb-6">Trending Videos</h1>

    @if(isset($videos) && count($videos) > 0)
        <div class="grid gap-4 md:gap-8 grid-cols-1 md:grid-cols-3">
            @foreach($videos as $video)
                <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 p-4">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ $video->snippet->thumbnails->medium->url }}" alt="{{$video->snippet->title}}">
                    <div class="flex flex-col justify-between mt-4 leading-normal">
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$video->snippet->title}}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">No trending videos available.</p>
    @endif
</div>

</body>
</html>
