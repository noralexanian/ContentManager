// import { defineConfig } from 'vite';
// import laravel from 'laravel-vite-plugin';
// import path from 'path';

// export default defineConfig({
//     plugins: [
//         laravel({
//             input: [
//                 'resources/css/app.css',
//                 'resources/js/app.js',
//                 'resources/js/article.js',
//             ],
//             refresh: true,
//         }),
//     ],
//     build: {
//         outDir: path.resolve(__dirname, 'public/build'),
//     },
// });


import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        hmr: {
            host: 'http://167.99.206.27:8081',
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/article.js'
            ],
            refresh: true,
        }),
    ],
});
