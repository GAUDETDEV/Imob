<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function index()
    {
        $notifications = auth()->user()->notifications()->paginate(10);
        return view('admin.notifications.index', compact('notifications'));
    }

}
