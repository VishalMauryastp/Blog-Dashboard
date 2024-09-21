<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Query;
use App\Notifications\NewMessageReceived;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Create a new message entry in the database
        $message =    Message::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        // Query::create([
        //     'title' => $message->subject,
        //     'description' => $message->message,
        // ]);

        // Notify all users (optional)
        $users = User::all();
        foreach ($users as $user) {
            $user->notify(new NewMessageReceived($message));
        }


        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }
    public function destroy(string $id)
    {

        $messages = Message::findOrFail($id);
        $messages->delete();

        return redirect()->route('inbox.index')->with('success', 'Blog post deleted successfully!');
    }

    public function index()
    {
        // Retrieve all messages
        $messages = Message::all();

        // Return view with messages
        return view('messages.index', compact('messages'));
    }
}
