<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $messages = Message::where('receiver_id', Auth::id())->paginate(10);

        return view('admin.messages.index',[

            'messages' => $messages,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::where('id', '!=', Auth::id())->get();

        return view('admin.messages.form',[

            'users' => $users,

        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string|max:255',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
        ]);


        return redirect()->route('admin.messages.index')->with('success', "Message envoyé avec succès!");


    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
        if ($message->receiver_id !== Auth::id() && $message->sender_id !== Auth::id()) {
            abort(403);
        }

        if ($message->receiver_id === Auth::id() && $message->read_at === null) {
            $message->update(['read_at' => now()]);
        }

        return view('admin.messages.show',[

            'message' => $message,

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */

    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
