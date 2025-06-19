<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Jobs\SendBulkEmailJob;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class BulkEmailController extends Controller
{
    // WITHOUT QUEUE
    public function sendWithoutQueue(Request $request)
    {
        $users = User::all();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new WelcomeEmail($user));
        }

        return back()->with('success', 'Emails sent without queue!');
    }

    // WITH QUEUE
    public function sendWithQueue(Request $request)
    {
        $users = User::all();

        foreach ($users as $user) {
            SendBulkEmailJob::dispatch($user); // dispatched to queue
        }

        return back()->with('success', 'Emails dispatched to queue!');
    }
}
