import { resolve } from 'path'
import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'
import ViteRestart from 'vite-plugin-restart'

export default defineConfig((command, mode, ssrBuild) => {
    return {
        base:    command === 'serve' ? '' : '/dist/',
        build:   {
            manifest:      true,
            outDir:        './httpdocs/dist/',
            rollupOptions: {
                input: {
                    app: 'src/js/app.js',
                }
            }
        },
        server:  {
            host:       '0.0.0.0',
            port:       3000,
            strictPort: true,
            origin:     `${process.env.DDEV_PRIMARY_URL}:3000`,
            cors:       {
                origin: /https?:\/\/([A-Za-z0-9\-\.]+)?(\.ddev\.site)(?::\d+)?$/,
            },
        },
        plugins: [
            tailwindcss(),
            ViteRestart({
                reload: [
                    'templates/**/*',
                ]
            })
        ]
    }
})
