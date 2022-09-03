<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saved_Song extends Model
{
    use HasFactory;
    protected $table = 'saved_songs';

    public function songs()
    {
        return $this->morphedByMany(Song::class, 'taggable');
    }

    public function playlists()
    {
        return $this->morphedByMany(Playlist::class, 'taggable');
    }
}
