<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubmitTimesheetEmail extends Mailable
{
    use Queueable, SerializesModels;
     public $timesheet;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($timesheet)
    {
        $this->timesheet = $timesheet;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    
    public function build()
    {
        return $this->markdown('email.submit_timesheet')
        ->subject('You have new timesheet for approval')
        ->with([
            'timesheet'=> $this->timesheet,
        ])->attach($this->timesheet['file']);
    }
}
