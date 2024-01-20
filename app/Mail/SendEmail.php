<?php

namespace App\Mail;

use App\Models\Category;
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
    public $generatedPassword;
    public $skill_id;
    public $skill;

    public function __construct($fullname,$generatedPassword, $skill_id)
    {
        $this->fullname = $fullname;
        $this->generatedPassword = $generatedPassword;
        $this->skill_id = $skill_id;

        $this->skill = Category::findOrFail($this->skill_id);
    }

    public function build()
    {
        return $this->from('bhandas.3282@gmail.com')
                    ->subject('You have been approved as our technician')
                    ->view('emails.approved')
                    ->with(['name' => $this->fullname,
                    'generatedPassword' => $this->generatedPassword,
                    'skill' => $this->skill]);
    }
}
