<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Which playlist would you like to add the song to?') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/playlistdetails/add" >
                        @csrf
                        <input list="browsers" name="playlist" style="border-width: 2px;" placeholder="Default">
                        <datalist id="browsers" >
                            @foreach ($playlist as $key => $data)
                                <option value="{{$data->title}}">
                            @endforeach
                        </datalist></br>
                        <button type="submit" style="padding: 5px; border-width: 2px;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>