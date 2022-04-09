<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function notifyClear()
    {
        if (Auth::guard('admin')->user()) {
            Auth::guard('admin')->user()->unreadNotifications->markAsRead();
        }
        return back();
    }
}
