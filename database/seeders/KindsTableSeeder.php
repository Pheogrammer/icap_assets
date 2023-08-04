<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Kind;

class KindsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $kinds = ['Electrical', 'Mechanical', 'Plumbing', 'Stationary', 'Furniture'];

        foreach ($kinds as $kind) {
            Kind::create([
                'name' => $kind,
            ]);
        }
    }
}
