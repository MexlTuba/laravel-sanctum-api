@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Comment') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('comments.update', $comment) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="body" class="form-label">Comment</label>
                            <textarea class="form-control" id="body" name="body" rows="3" required>{{ $comment->body }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection