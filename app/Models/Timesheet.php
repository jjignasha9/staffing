<?php

namespace App\Models;

use App\Models\User;
use App\Models\Workday;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;

    protected $guarded  = [];

    
    public function workdays()
    {
        return $this->hasMany(Workday::class, 'timesheet_id', 'id');
    }

    public function client()
    {
        
        return $this->hasOne(User::class, 'id', 'client_id');
    }

    public function employee()
    {
        return $this->hasOne(User::class, 'id', 'employee_id');
    }

    public function supervisor()
    {
        return $this->hasOne(User::class, 'id', 'supervisor_id');
    }
    
}
