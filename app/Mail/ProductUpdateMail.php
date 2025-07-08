<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $subjectText;
    public $bodyText;

    public function __construct($user, $subjectText, $bodyText)
    {
        $this->user = $user;
        $this->subjectText = $subjectText;
        $this->bodyText = $bodyText;
    }

    public function build()
    {
        return $this->subject($this->subjectText)
            ->view('emails.product_update')
            ->with([
                'user' => $this->user,
                'subjectText' => $this->subjectText,
                'bodyText' => $this->bodyText,
            ]);
    }
}
