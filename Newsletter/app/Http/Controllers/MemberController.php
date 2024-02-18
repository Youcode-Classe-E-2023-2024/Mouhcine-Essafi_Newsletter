<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function subscribe(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'email' => 'required|unique:subscribers,email|ends_with:gmail.com|email'
        ]);

        event(new UserSubscribed($request->input('email')));
        return back()->with('success', 'You have been subscribed successfully.');
    }

    public function unsubscribe(Request $request): \Illuminate\Http\RedirectResponse
    {

        $member = Member::where('email', $request->input('email'));

        $member->update([
            'status' => 'unsubscribed',
        ]);
        return back()->with('success', 'Unsubscribed successfully.');
    }

}