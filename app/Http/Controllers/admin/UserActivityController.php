<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\UserActivity;
use Illuminate\Http\Request;

class UserActivityController extends Controller
{
    //
    public function index()
    {
        $userActivities = UserActivity::with('user')->orderBy('occurred_at', 'desc')->paginate(10);
        return view('admin.activities.index', compact('userActivities'));
    }

}
