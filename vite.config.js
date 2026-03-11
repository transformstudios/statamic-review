import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import statamic from '@statamic/cms/vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/cp.css', 'resources/js/cp.js'],
            publicDirectory: 'resources/dist',
            hotFile: 'resources/dist/hot',
        }),
        statamic(),
        tailwindcss()
    ],
});
