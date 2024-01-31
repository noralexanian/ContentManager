@extends('layouts.app')

@section('content')
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->content }}</p>
    <a href="{{ url('/') }}" class="btn btn-outline-secondary">Back to Articles</a>
@endsection
