<?php

namespace Database\Seeders;

use App\Models\PayrollStatuses;
use Database\Seeders\PayrollStatusesSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PayrollStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $statuses = [
            [
                'name' => 'pending',              
            ], [
                'name' => 'paid',
            ]
        ];

        PayrollStatuses::insert($statuses);  
    }
}
