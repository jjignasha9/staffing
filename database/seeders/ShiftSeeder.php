<?php

namespace Database\Seeders;
use App\Models\Shift;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shifts = [
            [
                'shifts' => 'regular',              
            ], [
                'shifts' => '1st shift',
            ], [
                'shifts' => '2nd shift',
            ],  [
                'shifts' => '3rd shift',
            ], [
                'shifts' => 'we shift',
            ]
        ];

        Shift::insert($shifts);
    }
}
