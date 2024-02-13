<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function addComment(Request $request, $technicianId)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        // Assuming you have a logged-in user
        $user = auth()->user();

        Comment::create([
            'user_id' => $user->id,
            'technician_id' => $technicianId,
            'comment' => $request->input('comment'),
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

}
