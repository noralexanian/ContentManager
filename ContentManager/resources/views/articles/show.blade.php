@extends('layouts.app')

@section('content')
    <a href="{{ url('/') }}" class="btn btn-outline-secondary mb-3">Back</a>
    <h3 class="header text-center">{{ $article->title }}</h3>
    <div class="article-body">
        <p>{{ $article->content }}</p>
    </div>
@endsection
