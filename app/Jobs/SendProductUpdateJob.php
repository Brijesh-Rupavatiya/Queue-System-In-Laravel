<?php

namespace App\Jobs;

use App\Models\User;
use App\Mail\ProductUpdateMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendProductUpdateJob implements ShouldQueue
{
    use Dispatchable, Queueable, SerializesModels;

    protected $user;
    protected $subject;
    protected $body;

    public function __construct(User $user, $subject, $body)
    {
        $this->user = $user;
        $this->subject = $subject;
        $this->body = $body;
    }

    public function handle()
    {
        Mail::to($this->user->email)->send(new ProductUpdateMail($this->user, $this->subject, $this->body));
    }
}
