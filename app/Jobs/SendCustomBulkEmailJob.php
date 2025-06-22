<?php

// namespace App\Jobs;

// use App\Models\User;
// use App\Mail\CustomAnnouncementMail;
// use Illuminate\Bus\Queueable;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Queue\SerializesModels;
// use Illuminate\Foundation\Bus\Dispatchable;

// class SendCustomBulkEmailJob implements ShouldQueue
// {
//     use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//     public $user;

//     public function __construct(User $user)
//     {
//         $this->user = $user;
//     }

//     public function handle(): void
//     {
//         Mail::to($this->user->email)->send(new CustomAnnouncementMail($this->user));
//     }
// }
