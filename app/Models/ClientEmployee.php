<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientEmployee extends Model
{
    public function client() 
      {
            return $this->hasOne(User::class, 'id', 'client_id');
      }
}
