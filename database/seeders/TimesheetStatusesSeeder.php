<?php

namespace Database\Seeders;
use App\Models\TimesheetStatuses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimesheetStatusesSeeder extends Seeder
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
                'name' => 'draft',              
            ], [
                'name' => 'pending',
            ], [
                'name' => 'approved',
            ],  [
                'name' => 'rejected',
            ]
        ];

        TimesheetStatuses::insert($statuses);  
    }
}
