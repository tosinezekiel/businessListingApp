<?php

use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Business::class, 5)->create()->each(function ($u) {
            $u->categories()->save(factory(App\Category::class)->make());
            $u->images()->save(factory(App\Image::class)->make());
        });
    }
}
