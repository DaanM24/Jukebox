<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//connects with the genre table
class Genre extends Model
{
    use HasFactory;
    protected $table = 'genres';

    //one to many relationship with genre
    public function songs()
    {
        return $this->hasMany(Song::class, 'genre');
    }
}
