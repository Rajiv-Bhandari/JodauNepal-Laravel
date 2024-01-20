<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\RejectedEmail;

class RejectedQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $fullname;
    protected $email;
    protected $rejectmessage;


    public function __construct($fullname, $email, $rejectmessage)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->rejectmessage = $rejectmessage;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $mailable = new RejectedEmail($this->fullname,$this->rejectmessage);
        try {
            Mail::to($this->email)->send($mailable);
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
        }
    }
}
