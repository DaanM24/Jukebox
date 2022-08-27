<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Temporary Playlist') }}
            @php $duration = 0
            @endphp
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($value as $key => $data)
                    {{$value[$key]}}
                    @foreach($song as $keys => $info)
                    @if ($info->id == $data)
                        {{$info->title}}
                        {{$info->album}}
                        {{$info->artist}}
                        {{$info->duration}}
                        @php
                        $duration = $duration + $info->duration
                        @endphp
                    @endif
                    @endforeach 
                    <a href="/playlist/{{$key}}/remove" style="padding: 5px; border-width: 2px; float:right;">Remove</a>
                    <a href="/songdetails/{{$data}}" style="padding: 5px; border-width: 2px; float:right">Details</a></br></br>
                    @endforeach
                    <b>Total Duration: {{$duration}} seconds</b>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
