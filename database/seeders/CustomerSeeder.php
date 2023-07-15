<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {

            $customer = new Customer;
            $customer->user_name = $faker->name;
            $customer->email = $faker->email;
            $customer->password = $faker->password;
            $customer->address = $faker->address;
            $customer->gender = 'M';
            $customer->dob = $faker->date;
            $customer->state = $faker->state;
            $customer->country = $faker->country;
            $customer->save();
        }
    }
}