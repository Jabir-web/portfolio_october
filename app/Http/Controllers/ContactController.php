<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //show
    public function show()
    {
        $message = Contact::get();
        return view('admin.contact.show', [
            'messages' => $message
        ]);
    }

    //store
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'address' => 'nullable|email|max:255',
            'message' => 'required|string',
            'user_id' => 'required',
        ]);

        Contact::create($data);

        if ($request->ajax()) {
            return response()->json(['message' => 'Message sent successfully.']);
        }

        return redirect()->back()->with('success', 'Message sent successfully.');
    }

    public function destroy($id)
    {
        $message = Contact::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Message deleted successfully');
    }

    public function markAsRead($id)
    {
        $message = Contact::findOrFail($id);
        $message->status = 'Read';
        $message->save();

        return redirect()->back()->with('success', 'Message marked as read.');
    }
}
