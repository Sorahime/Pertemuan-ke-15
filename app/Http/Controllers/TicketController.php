<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Category;

class TicketController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->is_admin) {
            $tickets = Ticket::with('category')->get();
        } else {
            $tickets = Ticket::with('category')
                ->where('user_id', $user->id)
                ->get();
        }

        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('tickets.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpg,png|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tickets', 'public');
        }

        Ticket::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('tickets.index');
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $ticket->update([
            'status' => $request->status
        ]);

        return back();
    }
}
