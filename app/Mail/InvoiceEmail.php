<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Storage;

class InvoiceEmail extends Mailable
{
    use Queueable, SerializesModels;
     public $invoice;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoice)
    {

         $this->invoice = $invoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.email_invoice')
        ->subject('You have new invoice')
        ->with([
            'invoice' => $this->invoice
        ])->attach(public_path($this->invoice['file']));
    }
}
