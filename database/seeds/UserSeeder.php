<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table("users")->truncate();

        $faker = Faker::create("pt_BR");

        foreach (range(1, 20) as $i) {
        	User::create([
        		'id' => $faker->unique()->word()
        	]);
        }
    }
}
