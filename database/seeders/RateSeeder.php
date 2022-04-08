<?php

namespace Database\Seeders;
use App\Models\Rate;
use Database\Seeders\RateSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $rates = [
            [           
                'client_id' => 3,  
                'employee_id' => 2,                
                'shift_id' => 1,              
                'pay_rate' => 10,              
                'bill_rate' => 12,                           
            ], [
                'client_id' => 3,
                'employee_id' => 2,                            
                'shift_id' => 2,              
                'pay_rate' => 12,              
                'bill_rate' => 14,
            ], [
                'client_id' => 3,
                'employee_id' => 2,                           
                'shift_id' => 3,              
                'pay_rate' => 14,              
                'bill_rate' => 16,
            ], [
                'client_id' => 3, 
                'employee_id' => 2,                        
                'shift_id' => 4,              
                'pay_rate' => 16,              
                'bill_rate' => 18,
            ], [
                'client_id' => 3, 
                'employee_id' => 2,                        
                'shift_id' => 5,              
                'pay_rate' => 18,              
                'bill_rate' => 20,
            ],
        ];

        Rate::insert($rates); 
    }
}
