<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $table = 'songs';

    //one to many relationship with genre
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    //many to many relationship with playlist
    public function saved_songs()
    {
        return $this->morphToMany(Saved_Song::class, 'taggable');
    }
}
