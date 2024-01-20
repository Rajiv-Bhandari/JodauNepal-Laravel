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
    protected $skill_id;

    public function __construct($fullname, $email, $rejectmessage, $skill_id)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->rejectmessage = $rejectmessage;
        $this->skill_id = $skill_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $mailable = new RejectedEmail($this->fullname,$this->rejectmessage,$this->skill_id);
        try {
            Mail::to($this->email)->send($mailable);
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
        }
    }
}
