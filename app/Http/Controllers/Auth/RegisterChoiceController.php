<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterChoiceController extends Controller
{
    public function handle(Request $request)
    {
        if ($request->action === 'with_queue') {
            return redirect()->route('register.withQueue');
        } elseif ($request->action === 'without_queue') {
            return redirect()->route('register.withoutQueue');
        } else {
            return redirect()->back()->with('error', 'Invalid selection.');
        }
    }
}
