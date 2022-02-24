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
        $name = [
            [
                'name' => 'regular',              
            ], [
                'name' => '1st shift',
            ], [
                'name' => '2nd shift',
            ],  [
                'name' => '3rd shift',
            ], [
                'name' => 'we shift',
            ]
        ];

        Shift::insert($name);
    }
}
