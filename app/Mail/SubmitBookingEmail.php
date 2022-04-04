<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubmitBookingEmail extends Mailable
{
    use Queueable, SerializesModels;
     public $booking;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    
    public function build()
    {
        return $this->markdown('email.submit_booking')
        ->subject('You have a booking notification')
        ->with([
            'booking'=> $this->booking,
        ]);
    }
}
