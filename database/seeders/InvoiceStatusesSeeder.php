<?php

namespace Database\Seeders;

use App\Models\InvoiceStatuses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceStatusesSeeder extends Seeder
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
                'name' => 'sent',
            ]
        ];

        InvoiceStatuses::insert($statuses);  
    }
}
