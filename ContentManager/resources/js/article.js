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
