<?php

use App\Models\InvoiceStatuses;
use App\Models\PayrollStatuses;
use App\Models\TimesheetStatuses;

if (! function_exists('getStatusId')) {
    function getStatusId($status) {
        
        $status_pending = TimesheetStatuses::where('name', $status)->first();

        return $status_pending->id;
    }
}
if (! function_exists('payrollStatusId')) {
    function payrollStatusId($status) {
        
        $status_payroll = PayrollStatuses::where('name', $status)->first();

        return $status_payroll->id;
    }
}
if (! function_exists('invoiceStatusId')) {
    function invoiceStatusId($status) {
        
        $status_invoice = InvoiceStatuses::where('name', $status)->first();

        return $status_invoice->id;
    }
}