import { readdirSync, statSync } from 'node:fs';
import { join } from 'node:path';

import inertia from '@inertiajs/vite';
import { wayfinder } from '@laravel/vite-plugin-wayfinder';
import tailwindcss from '@tailwindcss/vite';
import react from '@vitejs/plugin-react';
import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

const collectTsxEntries = (dir: string): string[] => {
    const entries: string[] = [];

    for (const name of readdirSync(dir)) {
        const fullPath = join(dir, name);
        const stat = statSync(fullPath);

        if (stat.isDirectory()) {
            entries.push(...collectTsxEntries(fullPath));

            continue;
        }

        if (name.endsWith('.tsx')) {
            entries.push(fullPath.replace(/\\/g, '/'));
        }
    }

    return entries;
};

const pageEntries = collectTsxEntries('resources/js/pages');

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.tsx',
                ...pageEntries,
            ],
            refresh: true,
        }),
        inertia(),
        react({
            babel: {
                plugins: ['babel-plugin-react-compiler'],
            },
        }),
        tailwindcss(),
        wayfinder({
            formVariants: true,
        }),
    ],
});
