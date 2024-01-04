<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\Technician;

class SendApprovalEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $technician;
    protected $generatedPassword;

    /**
     * Create a new job instance.
     */
    public function __construct($technician, $generatedPassword)
    {
        $this->technician = $technician;
        $this->generatedPassword = $generatedPassword;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Place your email sending logic here
        Mail::send('emails.approved', ['technician' => $this->technician, 'password' => $this->generatedPassword], function ($message) {
            $message->to($this->technician->email, $this->technician->fullname)
                ->subject('You have been approved');
        });
    }
}

