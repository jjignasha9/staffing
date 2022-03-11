<?php

use App\Models\TimesheetStatuses;

if (! function_exists('getStatusId')) {
    function getStatusId($status) {
        
        $status_pending = TimesheetStatuses::where('name', $status)->first();

        return $status_pending->id;
    }
}