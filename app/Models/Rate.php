<?php

namespace App\Models;

use App\Models\User;
use App\Models\shift;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
     public function client() 
      {
            return $this->hasOne(User::class, 'id', 'client_id');
      }

      public function employee() 
      {
            return $this->hasOne(User::class, 'id', 'employee_id');
      }
       public function shift() 
      {
            return $this->hasOne(shift::class, 'id', 'shift_id');
      }

}
