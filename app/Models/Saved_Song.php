<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//connects with the saved_song database and establishes relationship between songs and playlists
class Saved_Song extends Model
{
    use HasFactory;
    protected $table = 'saved_songs';

    //many to many relationship between songs and playlists
    public function songs()
    {
        return $this->morphedByMany(Song::class, 'taggable');
    }

    //many to many relationship between songs and playlists
    public function playlists()
    {
        return $this->morphedByMany(Playlist::class, 'taggable');
    }
}
