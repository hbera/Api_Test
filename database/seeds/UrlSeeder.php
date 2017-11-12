<?php

use Illuminate\Database\Seeder;
use App\Models\Url;
use App\Models\User;
use Faker\Factory as Faker;

class UrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table("urls")->truncate();

        $faker = Faker::create("pt_BR");
        $users = DB::table("users")->pluck("id")->all();
        foreach (range(1,500) as $i) {
        	Url::create([
        		'hits' => $faker->numberBetween(1,10000),
        		'url' => $faker->unique()->url(),
        		'shortUrl' => $faker->unique()->url(),
        		'user_id' => $faker->randomElement($users)
        	]);
        }
    }
}
