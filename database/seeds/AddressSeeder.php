<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Business::class, 5)->create()->each(function ($user) {
        //     $user->address()->save(factory(App\Address::class)->make());
        // });
        DB::table('addresses')->insert([
        	'business_id' => 1,
        	'city' => 'yaba',
        	'state' => 'lagos',
        	'country' => "Nigeria"
        ]);
    	DB::table('addresses')->insert([
        	'business_id' => 2,
        	'city' => 'Agege',
        	'state' => 'Lagos',
        	'country' => 'Nigeria'
        ]);
    	DB::table('addresses')->insert([
        	'business_id' => 3,
        	'city' => 'Oshodi',
        	'state' => 'Lagos',
        	'country' => 'Nigeria'
        ]);
    	DB::table('addresses')->insert([
        	'business_id' => 4,
        	'city' => 'Victoria Island',
        	'state' => 'Lagos',
        	'country' => 'Nigeria'
        ]);
        DB::table('addresses')->insert([
        	'business_id' => 5,
        	'city' => 'Lekki',
        	'state' => 'Lagos',
        	'country' => 'Nigeria'
		]);
		DB::table('addresses')->insert([
        	'business_id' => 6,
        	'city' => 'Lekki',
        	'state' => 'Lagos',
        	'country' => 'Nigeria'
		]);
		DB::table('addresses')->insert([
        	'business_id' => 7,
        	'city' => 'Lekki',
        	'state' => 'Lagos',
        	'country' => 'Nigeria'
		]);
		DB::table('addresses')->insert([
        	'business_id' => 8,
        	'city' => 'yaba',
        	'state' => 'lagos',
        	'country' => "Nigeria"
        ]);
    	DB::table('addresses')->insert([
        	'business_id' => 9,
        	'city' => 'Agege',
        	'state' => 'Lagos',
        	'country' => 'Nigeria'
        ]);
    	DB::table('addresses')->insert([
        	'business_id' => 10,
        	'city' => 'Oshodi',
        	'state' => 'Lagos',
        	'country' => 'Nigeria'
        ]);
    	DB::table('addresses')->insert([
        	'business_id' => 11,
        	'city' => 'Victoria Island',
        	'state' => 'Lagos',
        	'country' => 'Nigeria'
        ]);
        DB::table('addresses')->insert([
        	'business_id' => 12,
        	'city' => 'Lekki',
        	'state' => 'Lagos',
        	'country' => 'Nigeria'
		]);
    }
}
