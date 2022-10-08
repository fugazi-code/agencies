<?php

namespace Database\Seeders;

use App\Models\Agency;
use App\Models\Candidate;
use App\Models\ForeignAgency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DevEnvironmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  php artisan db:seed --class=DevEnvironmentSeeder
     *
     * @return void
     */
    public function run()
    {
        Agency::factory()->count(100)->create();
        Agency::query()->each(function ($value) {
            Candidate::factory()->count(10)->create(['agency_id' => $value->id]);
            ForeignAgency::factory()->count(10)->create(['agency_id' => $value->id]);
        });

    }
}
