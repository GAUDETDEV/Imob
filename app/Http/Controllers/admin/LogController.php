<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = $request->input('query');

        $logs = Log::with('user')->orderBy('logged_at', 'desc')
        ->where('action', 'like', "%$query%")
        ->orWhere('description', 'like', "%$query%")
        ->paginate(10);

        return view('admin.logs.index', compact('logs'));

    }

}
