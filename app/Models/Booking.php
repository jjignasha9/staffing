<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory; 

    protected $fillable = ['employee_id','client_id','start','end','hours'];
    
     public function employee()
    {
        return $this->hasOne(User::class, 'id', 'employee_id');
    }
    public function client()
    {
        return $this->hasOne(User::class, 'id', 'client_id');
    }
}
