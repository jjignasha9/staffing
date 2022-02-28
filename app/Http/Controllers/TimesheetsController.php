<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;


class TimesheetsController extends Controller
{
    function __construct() {
        $today = Carbon::now();
        $this->weekend = $today->endOfWeek();
    }

    public function index()
    {
        return view('timesheets.index');
    }

    public function create($weekend = 0)
    {   
        $temp_weekend = $weekend;

        if ($weekend) {

            $days = abs($weekend) * 7;

            if ($weekend < 0) {

                $weekend = $this->weekend->subDays($days);    

            } else if ($weekend > 0) {

                $weekend = $this->weekend->addDays($days);    

            }

            $weekend = $weekend->format('m/d');   

            
        } else {

            $weekend = $this->weekend->format('m/d');    

        }


        $weekdays = [
            [
                'name' => 'Mon',
                'date' => Carbon::parse($weekend)->subDays(6)->format('m/d')
            ], [
                'name' => 'Tue',
                'date' => Carbon::parse($weekend)->subDays(5)->format('m/d')
            ], [
                'name' => 'Wed',
                'date' => Carbon::parse($weekend)->subDays(4)->format('m/d')
            ], [
                'name' => 'Thu',
                'date' => Carbon::parse($weekend)->subDays(3)->format('m/d')
            ], [
                'name' => 'Fri',
                'date' => Carbon::parse($weekend)->subDays(2)->format('m/d')
            ], [
                'name' => 'Sat',
                'date' => Carbon::parse($weekend)->subDays(1)->format('m/d')
            ], [
                'name' => 'Sun',
                'date' => Carbon::parse($weekend)->format('m/d')
            ], 
        ];



        return view('timesheets.create', compact(['weekend', 'temp_weekend', 'weekdays']));
    }

}
