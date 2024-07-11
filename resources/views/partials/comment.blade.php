<div class="card mb-2">
    <div class="card-body">
        <p>{{ $comment->body }}</p>
        <p class="text-muted">{{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}</p>
        @can('update', $comment)
        <a href="{{ route('comments.edit', $comment) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
        @endcan
        @can('delete', $comment)
        <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
        </form>
        @endcan
    </div>
</div>