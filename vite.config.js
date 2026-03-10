import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import statamic from '@statamic/cms/vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/cp.css', 'resources/js/cp.js'],
            publicDirectory: 'dist',
        }),
        statamic(),
        tailwindcss()
    ],
});
