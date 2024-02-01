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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-article');

    deleteButtons.forEach(button => {

        // Add click event to delete buttons
        button.addEventListener('click', function(event) {
            event.preventDefault();
            
            // Delete functionality
            if (confirm('Are you sure you want to delete this article?')) {
                const articleSlug = this.getAttribute('data-slug');
                fetch(`/articles/${articleSlug}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                // Error response
                .then(response => {
                    if (!response.ok) {
                        if (response.status === 404) {
                            alert('Article not found or already deleted.');
                        } else {
                            throw new Error('Network response was not ok');
                        }
                    }
                    return response.json();
                })
                // Success
                .then(data => {
                    window.location.reload();
                })
                .catch(error => {
                    console.error('There has been a problem with your fetch operation:', error);
                    alert('Something went wrong.');
                });                
            }
        });
    });
});
</script>
@endpush

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
