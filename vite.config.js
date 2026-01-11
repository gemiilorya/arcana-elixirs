import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public',
        emptyOutDir: false,
    },
});