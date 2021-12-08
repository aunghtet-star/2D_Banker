<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $user = Auth::guard('web')->user();
        $notifications = $user->notifications()->paginate(5);
        $user->unreadNotifications->markAsRead();

        return view('notification.index', compact('user', 'notifications'));
    }
}
