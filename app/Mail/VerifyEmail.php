<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $url = URL::temporarySignedRoute(
            'custom.verification.verify',
            now()->addMinutes(60),
            ['id' => $this->user->id, 'hash' => sha1($this->user->getEmailForVerification())]
        );

        return $this->subject('Verify Your Email')
                    ->view('emails.verify')
                    ->with(['url' => $url]);
    }
}
