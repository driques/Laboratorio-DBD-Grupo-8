<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        \App\Models\Country::factory(193)->create();
        \App\Models\Rol::factory(2)->create();
        \App\Models\Album::factory(10)->create();
        \App\Models\Genre::factory(10)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Payment_history::factory(10)->create();
        \App\Models\Song::factory(100)->create();
        \App\Models\Like_song::factory(50)->create();
        \App\Models\Playlist::factory(45)->create();
        \App\Models\Follow_user::factory(45)->create();
        \App\Models\Playlist_group::factory(45)->create();
        \App\Models\CountrySongRestriction::factory(40)->create();
        
    }
}
