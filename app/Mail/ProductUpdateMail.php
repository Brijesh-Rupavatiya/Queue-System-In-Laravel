<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


// class ProductUpdateMail extends Mailable
// {
//     use Queueable, SerializesModels;
//      public $username;
//     public $messageContent;

//     /**
//      * Create a new message instance.
//      */
//     public function __construct($username, $messageContent)
//     {
//         $this->username = $username;
//         $this->messageContent = $messageContent;
//     }




//      public function build()
//     {
//         return $this->subject('Exciting Product Update')
//                     ->markdown('emails.product-update')
//                     ->with([
//                         'username' => $this->username,
//                         'messageContent' => $this->messageContent,
//                     ]);
//     }

//     /**
//      * Get the message envelope.
//      */
//     // public function envelope(): Envelope
//     // {
//     //     return new Envelope(
//     //         subject: 'Product Update Mail',
//     //     );
//     // }

//     // /**
//     //  * Get the message content definition.
//     //  */
//     // public function content(): Content
//     // {
//     //     return new Content(
//     //         markdown: 'emails.product-update',
//     //     );
//     // }

//     // /**
//     //  * Get the attachments for the message.
//     //  *
//     //  * @return array<int, \Illuminate\Mail\Mailables\Attachment>
//     //  */
//     // public function attachments(): array
//     // {
//     //     return [];
//     // }
// }



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
