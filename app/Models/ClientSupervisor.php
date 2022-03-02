<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSupervisor extends Model
{
    use HasFactory;

    public function supervisor()
    {
        return $this->hasOne(User::class, 'id', 'supervisor_id');
    }

}
