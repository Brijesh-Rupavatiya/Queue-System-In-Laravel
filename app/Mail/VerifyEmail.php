<?php

// namespace App\Mail;

// use App\Models\User;
// use Illuminate\Bus\Queueable;
// use Illuminate\Mail\Mailable;
// use Illuminate\Queue\SerializesModels;
// use Illuminate\Support\Facades\URL;
// use Illuminate\Support\Carbon;

// class VerifyEmail extends Mailable
// {
//     use Queueable, SerializesModels;

//     public $user;
//     public $verificationUrl;

//     public function __construct(User $user)
//     {
//         $this->user = $user;

//         // Generate the email verification URL
//         $this->verificationUrl = URL::temporarySignedRoute(
//             'custom.verify', // Ensure this route is correct
//             now()->addMinutes(60),
//             [
//                 'id' => $this->user->id,
//                 'hash' => sha1($this->user->email),
//             ]
//         );
//     }

//     public function build()
//     {
//         return $this->subject('Verify Your Email Address')
//             ->markdown('emails.verify')
//             ->with([
//                 'user' => $this->user,
//                 'verificationUrl' => $this->verificationUrl, // Pass the verificationUrl to the view
//             ]);
//     }
// }




// namespace App\Mail;

// use App\Models\User;
// use Illuminate\Bus\Queueable;
// use Illuminate\Mail\Mailable;
// use Illuminate\Queue\SerializesModels;
// use Illuminate\Support\Facades\URL;
// use Illuminate\Support\Carbon;

// class VerifyEmail extends Mailable
// {
//     use Queueable, SerializesModels;

//     public $user;
//     public $verificationUrl;

//     public function __construct(User $user)
//     {
//         $this->user = $user;

//         // Generate the email verification URL
//         $this->verificationUrl = URL::temporarySignedRoute(
//             'custom.verify', // Use your custom route name
//             now()->addMinutes(60),
//             [
//                 'id' => $this->user->id,
//                 'hash' => sha1($this->user->email),
//             ]
//         );
//     }

//     public function build()
//     {
//         return $this->subject('Verify Your Email Address')
//             ->markdown('emails.verify') // Ensure you have an email view at 'emails.verify'
//             ->with([
//                 'user' => $this->user,
//                 'verificationUrl' => $this->verificationUrl, // Passing the URL to the view
//             ]);
//     }
// }



// namespace App\Mail;

// use App\Models\User;
// use Illuminate\Bus\Queueable;
// use Illuminate\Mail\Mailable;
// use Illuminate\Queue\SerializesModels;
// use Illuminate\Support\Facades\URL;

// class VerifyEmail extends Mailable
// {
//     use Queueable, SerializesModels;

//     public $user;
//     public $verificationUrl;

//     public function __construct(User $user)
//     {
//         $this->user = $user;

//         $this->verificationUrl = URL::temporarySignedRoute(
//             'custom.verify',
//             now()->addMinutes(60),
//             [
//                 'id' => $user->id,
//                 'hash' => sha1($user->email),
//             ]
//         );
//     }

//     public function build()
//     {
//         return $this->subject('Verify Your Email Address')
//                     ->markdown('emails.verify')
//                     ->with([
//                         'user' => $this->user,
//                         'verificationUrl' => $this->verificationUrl,
//                     ]);
//     }
// }



namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

class VerifyEmail extends Mailable
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $url = URL::temporarySignedRoute(
            'verification.verify', // The route name
            now()->addMinutes(60),  // The expiration time
            ['id' => $this->user->getKey(), 'hash' => sha1($this->user->getEmailForVerification())]
        );

        return $this->subject('Verify Your Email Address')
                    ->view('emails.verify', ['url' => $url]);
    }
}
