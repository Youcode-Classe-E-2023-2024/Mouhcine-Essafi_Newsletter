<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use Illuminate\Http\Request;
use PharIo\Manifest\Email;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:subscribers,email'
        ]);
        event(new UserSubscribed($request->input('email')));
        return back();
    }
}
