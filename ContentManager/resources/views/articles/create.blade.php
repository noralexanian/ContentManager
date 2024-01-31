@extends('layouts.app')

@section('content')
    <a href="{{ url('/') }}" class="btn btn-outline-secondary mb-3">Back</a>
    <h3 class="header text-center">Create New Article</h3>
    <div class="article-body">
        <form method="POST" action="{{ url('/articles') }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
@endsection
