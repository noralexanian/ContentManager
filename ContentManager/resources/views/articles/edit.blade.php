@extends('layouts.app')

@section('content')
    <a href="{{ url('/') }}" class="btn btn-outline-secondary mb-3">Back</a>
    <h3 class="header text-center">Edit Article</h3>
    <form method="POST" action="{{ url('/articles', $article->slug) }}">
        @csrf
        @method('PUT')
        <div class="article-body">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="3" required>{{ $article->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        
    </form>
@endsection