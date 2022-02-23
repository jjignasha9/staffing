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
                'shifts' => 'First shift',              
            ], [
                'shifts' => 'Second shift',
            ], [
                'shifts' => 'Third shift',
            ],  [
                'shifts' => 'Forth shift',
            ], [
                'shifts' => 'Weekend shift',
            ]
        ];

        Shift::insert($shifts);
    }
}
