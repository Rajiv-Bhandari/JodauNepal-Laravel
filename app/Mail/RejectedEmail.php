<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RejectedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $fullname;
    public $rejectmessage;
   
    /**
     * Create a new message instance.
     */
    public function __construct($fullname, $rejectmessage)
    {
        $this->fullname = $fullname;
        $this->rejectmessage = $rejectmessage;
       
    }

    public function build()
    {
        return $this->from('bhandas.3282@gmail.com')
                    ->subject('You have been rejected as our technician')
                    ->view('emails.rejected')
                    ->with(['name' => $this->fullname,
                    'rejectmessage' => $this->rejectmessage]);
    }
}
