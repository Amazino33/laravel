import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
server: {
     watch: {
       usePolling: true,
       interval: 1000
     }
   },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
