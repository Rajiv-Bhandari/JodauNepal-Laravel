<?php

namespace App\Jobs;

use App\Models\Technician;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedEmail; // Import the ApprovedEmail Mailable

class SendApprovalEmailJob implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $technician;
    protected $generatedPassword;

    public function __construct(Technician $technician, $generatedPassword) {
        $this->technician = $technician;
        $this->generatedPassword = $generatedPassword;
    }

    public function handle() {
        $email = new ApprovedEmail($this->technician, $this->generatedPassword);

        Mail::to($this->technician->email, $this->technician->fullname)
            ->send($email);
    }
}
