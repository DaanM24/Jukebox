<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <b>Hello World</b></br></br>
                    <a href="/playlists" style="padding: 5px; border-width: 2px;">All Playlists</a></br></br>
                    <a href="/songlist" style="padding: 5px; border-width: 2px;">All Songs</a></br></br>
                    <a href="/genres" style="padding: 5px; border-width: 2px;">All Genres</a></br></br>
                    <a href="/playlist" style="padding: 5px; border-width: 2px;">Temporary playlist</a></br></br>
                    <a href="/myplaylists" style="padding: 5px; border-width: 2px;">My Playlists</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
