@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center header">Articles</h1>
        <a href="{{ url('/articles/create') }}" class="btn btn-primary mb-3">Publish New Article</a>

        @if ($articles->isEmpty())
            <p>No Articles Found</p>
        @else
            <div class="list-group">
                @foreach ($articles as $article)
                    <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <a href="{{ url('/articles', $article->slug) }}" class="text-decoration-none">
                            {{ $article->title }}
                        </a>
                        <div>
                            <a href="{{ url('/articles', [$article->slug, 'edit']) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <button class="btn btn-sm btn-outline-danger delete-article" data-slug="{{ $article->slug }}">Delete</button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-article');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                if (confirm('Are you sure you want to delete this article?')) {
                    const articleSlug = this.getAttribute('data-slug');
                    fetch(`/articles/${articleSlug}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        alert(data.success); // Or handle the success message in another way
                        window.location.reload(); // Or remove the deleted item from the DOM instead of reloading
                    })
                    .catch(error => {
                        console.error('There has been a problem with your fetch operation:', error);
                        alert('Something went wrong.'); // This will only be shown if there is a network error
                    });
                }
            });
        });
    });
</script>
@endpush