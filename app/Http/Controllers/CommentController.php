<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Reply;

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

    public function addReply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        $comment = Comment::findOrFail($id);

        $reply = new Reply([
            'user_id' => auth()->id(),
            'comment_id' => $comment->id,
            'reply' => $request->input('reply'),
        ]);
        
        $reply->save();

        return redirect()->back()->with('success', 'Reply added successfully!');
    }

}
