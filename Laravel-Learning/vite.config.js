import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/main.js',
                'resources/js/sidebar.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                // Đối với CSS và các asset khác, bỏ hash khỏi tên file
                assetFileNames: (assetInfo) => {
                    // Kiểm tra nếu file là CSS thì trả về tên cố định
                    if (assetInfo.name && assetInfo.name.endsWith('.css')) {
                        return 'assets/[name][extname]';
                    }
                    // Các asset khác vẫn có hash
                    return 'assets/[name]-[hash][extname]';
                },
                // Đối với file entry (JS) không có hash:
                entryFileNames: 'assets/[name].js',
                // Đối với các file chunk (JS) không có hash:
                chunkFileNames: 'assets/[name].js'
            },
        },
    },
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
});
