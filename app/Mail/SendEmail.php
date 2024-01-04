<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $fullname;

    public function __construct($fullname)
    {
        $this->fullname = $fullname;
    }

    public function build()
    {
        return $this->from('bhandas.3282@gmail.com')
                    ->subject('You have been approved as our technician')
                    ->view('emails.approved')
                    ->with(['name' => $this->fullname]);
    }
}
