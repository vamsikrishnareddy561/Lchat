<?php

namespace App\Http\Controllers;

use App\Events\UserOffline;
use App\User;
use Illuminate\Http\Request;

class UserOfflineController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = \App\User::find($request->user);
        $user->status = 'offline';
        $user->save();

        broadcast(new UserOffline($user));
    }
}