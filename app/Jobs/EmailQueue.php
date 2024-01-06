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
use App\Mail\SendEmail;

class EmailQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $fullname;
    protected $email;
    protected $generatedPassword;
    protected $skill;
    /**
     * Create a new job instance.
     */
    public function __construct($fullname, $email, $generatedPassword, $skill)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->generatedPassword = $generatedPassword;
        $this->skill = $skill;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $mailable = new SendEmail($this->fullname,$this->generatedPassword,$this->skill);
        try {
            Mail::to($this->email)->send($mailable);
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
        }
    }
}
