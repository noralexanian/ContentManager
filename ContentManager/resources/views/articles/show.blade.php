@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-6">
            <a href="{{ url('/') }}" class="btn btn-outline-secondary mb-3">Back</a>
            <h3 class="header text-center">{{ $article->title }}</h3>
            <div class="article-body mt-2">
                <p>{{ $article->content }}</p>
            </div>
        </div>
    </div>
@endsection


@push('styles')
<style>
.header {
    background: #e2f2e6;
    border-radius: 15px;
    padding: 20px;
}

.article-body {
    background: #f4f4f4;
    border-radius: 15px;
    padding: 20px;
    min-height: 200px;
}
</style>
@endpush