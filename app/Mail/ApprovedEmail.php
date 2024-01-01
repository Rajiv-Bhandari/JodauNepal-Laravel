<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ApprovedEmail extends Mailable {
    public $technician;
    public $password;

    public function __construct($technician, $password) {
        $this->technician = $technician;
        $this->password = $password;
    }

    public function build() {
        return $this->view('emails.approved')
            ->subject('You have been approved');
    }
}

