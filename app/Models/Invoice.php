<?php

namespace App\Models;

use App\Models\InvoiceItems;
use App\Models\Term;
use App\Models\User;
use App\Models\Timesheet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function timesheet()
    {
        return $this->hasOne(Timesheet::class, 'id', 'timesheet_id');
    }

    public function term()
    {
        return $this->hasOne(Term::class, 'id', 'terms_id');
    }

    public function invoices()
    {
        return $this->hasMany(InvoiceItems::class, 'invoice_id', 'id');
    }

    public function client()
    {
        return $this->hasOne(User::class, 'id', 'client_id');
    }

    public function employee()
    {
        return $this->hasOne(User::class, 'id', 'employee_id');
    }

}
