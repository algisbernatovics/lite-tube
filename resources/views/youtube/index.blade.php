<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">

<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6">Trending YouTube Videos</h1>

    @if(isset($videos) && count($videos) > 0)
        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($videos as $video)
                <li class="bg-white rounded-lg overflow-hidden shadow-lg">
                    <img class="w-full h-48 object-cover" src="{{ $video->snippet->thumbnails->medium->url }}" alt="{{ $video->snippet->title }}">
                    <div class="p-4">
                        <h2 class="text-xl font-bold mb-2">{{ $video->snippet->title }}</h2>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-600">No trending videos available.</p>
    @endif
</div>

</body>
</html>
