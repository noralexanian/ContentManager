// document.addEventListener('DOMContentLoaded', function() {
//     const deleteButtons = document.querySelectorAll('.delete-article');

//     deleteButtons.forEach(button => {
//         button.addEventListener('click', function(event) {
//             event.preventDefault();
//             if (confirm('Are you sure you want to delete this article?')) {
//                 const articleSlug = this.getAttribute('data-slug');
//                 fetch(`/articles/${articleSlug}`, {
//                     method: 'DELETE',
//                     headers: {
//                         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//                     }
//                 }).then(response => {
//                     if (response.ok) {
//                         window.location.reload();
//                     } else {
//                         alert('Something went wrong.');
//                     }
//                 });
//             }
//         });
//     });
// });
