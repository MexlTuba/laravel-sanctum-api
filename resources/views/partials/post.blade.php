<div class="card mb-3">
    <div class="card-header">
        {{ $post->user->name }} - {{ $post->created_at->diffForHumans() }}
        @can('update', $post)
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
        @endcan
        @can('delete', $post)
        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
        </form>
        @endcan
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ $post->body }}</p>
    </div>
    <div class="card-footer">
        <h6>Comments</h6>
        @foreach ($post->comments as $comment)
        @include('partials.comment', ['comment' => $comment])
        @endforeach
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="mb-3">
                <label for="body" class="form-label">New Comment</label>
                <textarea class="form-control" id="body" name="body" rows="2" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Comment</button>
        </form>
    </div>
</div>