<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use App\Jobs\SendCustomBulkEmailJob;
use App\Mail\ProductUpdateMail;
use App\Jobs\SendProductUpdateJob;
use Illuminate\Support\Facades\Mail;

class BulkEmailController extends Controller
{
    public function showForm($type)
    {
        return view('bulk_email_form', ['type' => $type]);
    }
    //Send bulk mail WITHOUT QUEUE
    public function sendWithoutQueue(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'body' => 'required|string',
        ]);

        $users = User::all();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new ProductUpdateMail($user, $request->subject, $request->body));
        }
        return redirect()->back()->with('success', 'Sent to all users without queue');
    }

    // Send bulk mail WITH QUEUE
    public function sendWithQueue(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'body' => 'required|string',
        ]);

        $users = User::all();
        foreach ($users as $user) {
            SendProductUpdateJob::dispatch($user, $request->subject, $request->body);
        }
        return redirect()->back()->with('success', 'Emails have been queued successfully!');
    }

}
