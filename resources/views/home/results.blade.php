<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos</title>

    <!-- Include CSS and JS files using Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black font-sans">

<div class="container mx-auto p-8">

    <form class="max-w-md mx-auto mb-8" action="/search" method="GET">
        <label for="default-search" class="mb-2 text-sm font-medium text-white sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="default-search" name="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search videos..." required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>

    @if(isset($videos) && count($videos) > 0)
        <div class="grid gap-4 md:gap-8 grid-cols-1 md:grid-cols-3">
            @foreach($videos as $video)
                <a href="#" onclick="openVideoModal('{{ $video->id->videoId }}', '{{ $video->snippet->title }}')" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 p-4">
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

    <!-- Modal -->
    <div id="videoModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-black rounded-lg shadow-lg p-8">
            <div id="videoContainer"></div>
            <div class="flex justify-end mt-4">
                <button onclick="closeVideoModal()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-4">Close</button>
            </div>
        </div>
    </div>

</div>

<!-- JavaScript -->
<script>
    function openVideoModal(videoId, title) {
        var iframe = document.createElement('iframe');
        iframe.setAttribute('width', '560');
        iframe.setAttribute('height', '315');
        iframe.setAttribute('src', 'https://www.youtube.com/embed/' + videoId + '?modestbranding=1');
        iframe.setAttribute('frameborder', '0');
        iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
        iframe.setAttribute('allowfullscreen', 'true');

        var container = document.getElementById('videoContainer');
        container.innerHTML = '';
        container.appendChild(iframe);

        var modal = document.getElementById('videoModal');
        modal.classList.remove('hidden');
    }
    function closeVideoModal() {
        var modal = document.getElementById('videoModal');
        modal.classList.add('hidden');
    }
</script>

</body>
</html>
