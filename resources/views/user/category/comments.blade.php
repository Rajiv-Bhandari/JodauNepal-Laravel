<!-- Display technician details -->
<div class="card-body table-responsive p-2">
    <h2>Comments ({{ $comments->count() }})</h2>

    <!-- Form to add a comment -->
    <form method="post" action="{{ route('user.booking.addComment', ['technicianId' => $technician->id]) }}" class="mb-4">
        @csrf
        <div class="input-group">
            <input type="text" name="comment" class="form-control" placeholder="Add your comment..." aria-label="Add your comment..." required>
            <button type="submit" class="btn btn-primary">Comment</button>
        </div>
    </form>

    <!-- Display existing comments -->
    @forelse($comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <p class="card-text">{{ $comment->comment }}</p>
                <p class="card-subtitle text-muted">
                    Posted by: {{ $comment->user->name }} on {{ $comment->created_at->format('Y-m-d, H:i:s') }}
                </p>
                <!-- Display replies for this comment -->
                @forelse($comment->replies as $reply)
                    <div class="ml-4 mt-3">
                        <p>{{ $reply->reply }}</p>
                        <p class="text-muted">Replied by: {{ $reply->user->name }} on {{ $reply->created_at }}</p>
                    </div>
                @empty
                    <p class="text-muted">No replies yet.</p>
                @endforelse
            </div>
        </div>
    @empty
        <p>No comments yet.</p>
    @endforelse
</div>
