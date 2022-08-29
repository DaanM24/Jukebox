<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Song Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @foreach($song as $key => $data)
                    <tr>    
                    <th><b>Title: </b>{{$data->title}}</th></br>
                    <th><b>Artist: </b>{{$data->artist}}</th></br>
                    <th><b>Album: </b>{{$data->album}}</th></br>
                    <th><b>Genre: </b>{{$data->genre}}</th></br>
                    <th><b>Duration: </b>{{$data->duration}}</th></br></br>
                    <a href="/playlistdetails/{{$data->id}}/addSong" style="padding: 5px; border-width: 2px;">Add to playlist</a>
                    <a href="/playlist/{{$data->id}}/add" style="padding: 5px; border-width: 2px;">Add to temporary playlist</a>
                    </tr>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
