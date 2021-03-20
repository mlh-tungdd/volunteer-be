<?php

namespace Database\Seeders;

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
        $this->call([
            UserSeeder::class,
            DistrictSeeder::class
        ]);
        \App\Models\User::factory(10)->create();
        \App\Models\CategoryNews::factory(10)->create();
        \App\Models\News::factory(10)->create();
        \App\Models\CategoryAlbum::factory(10)->create();
        \App\Models\Album::factory(10)->create();
        \App\Models\AlbumImage::factory(10)->create();
        \App\Models\School::factory(10)->create();
        \App\Models\Video::factory(10)->create();
        \App\Models\Contact::factory(10)->create();
        \App\Models\Setting::factory(1)->create();
        \App\Models\Banner::factory(10)->create();
        \App\Models\Event::factory(10)->create();
    }
}
