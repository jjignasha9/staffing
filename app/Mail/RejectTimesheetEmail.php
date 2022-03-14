<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RejectTimesheetEmail extends Mailable
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
        return $this->markdown('email.reject_timesheet')
        ->subject('Your timesheet has been rejected')
        ->with([
            'timesheet' => $this->timesheet
        ]);
        
    }
}
