<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workday extends Model
{
    use HasFactory;

    protected $guarded  = [];


    public function shifts()
    {
        return $this->hasOne(shifts::class, 'id', 'shift_id');
    }

    public function supervisor_id()
    {
        return $this->hasOne(Timesheet::class, 'id', 'timesheet_id');
    }
}
