<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
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
                'name' => 'NET 15',              
            ], [
                'name' => 'NET 30',
            ], [
                'name' => 'NET 45',
            ]
        ];

        Term::insert($name);
    }
}
