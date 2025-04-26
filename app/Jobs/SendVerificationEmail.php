<?php

namespace App\Jobs;

use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable; // Add this line
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class SendVerificationEmail implements ShouldQueue
{
    use Dispatchable, Queueable, SerializesModels; // Use Dispatchable trait

    public $user;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Generate the email verification URL
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify', now()->addMinutes(60), ['id' => $this->user->id]
        );

        // Send verification email
        Mail::to($this->user->email)->send(new VerifyEmail($this->user));
    }
}
