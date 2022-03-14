<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RejectTimesheetEmail extends Mailable
{
    use Queueable, SerializesModels;
     public $mailData;
     public $timesheet;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData, $timesheet)
    {
        $this->mailData = $mailData;
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
        ->with('mailData', $this->mailData);
        
    }
}
