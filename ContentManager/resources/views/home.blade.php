@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1 class="header">Articles</h1>
        <a href="{{ url('/articles/create') }}" class="btn btn-primary mb-2">Publish New Article</a>
    </div>

    <div class="article-body">
        @if ($articles->isEmpty())
            <p>No Articles Found</p>
        @else
            <div class="row justify-content-center">
                @foreach ($articles as $article)
                    <div class="col-12 col-md-6 col-lg-4 mt-2">
                        <div class="list-group">
                            <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <a href="{{ url('/articles', $article->slug) }}" class="text-decoration-none">
                                    {{ $article->title }}
                                </a>
                                <div>
                                    <a href="{{ url('/articles', [$article->slug, 'edit']) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    <button class="btn btn-sm btn-outline-danger delete-article" data-slug="{{ $article->slug }}">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

@endsection