<?php

namespace Database\Seeders;

use Database\Seeders\PayrollStatusesSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\ShiftSeeder;
use Database\Seeders\TermSeeder;
use Database\Seeders\TimesheetStatusesSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ShiftSeeder::class,
            RateSeeder::class,
            PayrollStatusesSeeder::class,
            TimesheetStatusesSeeder::class,
            TermSeeder::class,
            InvoiceStatusesSeeder::class,
        ]);
    }
}
