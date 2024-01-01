<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\Technician;
use Illuminate\Mail\Mailable;

class SendRejectionEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $technician;
    protected $rejectMessage;

    public function __construct(Technician $technician, $rejectMessage)
    {
        $this->technician = $technician;
        $this->rejectMessage = $rejectMessage;
    }

    public function handle()
    {
        // Send an email to the rejected technician
        $email = new class($this->technician, $this->rejectMessage) extends Mailable {
            public $technician;
            public $rejectMessage;

            public function __construct($technician, $rejectMessage)
            {
                $this->technician = $technician;
                $this->rejectMessage = $rejectMessage;
            }

            public function build()
            {
                return $this->view('emails.rejected')
                    ->subject('Sorry! You have been rejected');
            }
        };

        Mail::to($this->technician->email, $this->technician->fullname)
            ->send($email);
    }
}
