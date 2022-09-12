<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//connects with the playlist database
class Playlist extends Model
{
    use HasFactory;
    protected $table = 'playlists';

    //many to many relationship with song
    public function saved_songs()
    {
        return $this->morphToMany(Saved_Song::class, 'taggable');
    }
}
