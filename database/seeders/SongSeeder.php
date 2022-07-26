<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Song::factory(10)->create();

        // DB::table('songs')->insert([
        //     'title' => Str::random(10),
        //     'artist' => Str::random(10),
        //     'album' => Str::random(10),
        // ]);
    }
}
