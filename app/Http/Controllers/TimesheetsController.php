<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimesheetsController extends Controller
{
    public function index()
    {
        return view('timesheets.index');
    }

    public function create()
    {
        return view('timesheets.create');
    }

}