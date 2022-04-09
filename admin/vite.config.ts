import { ConfigEnv, defineConfig, loadEnv, splitVendorChunkPlugin } from 'vite'
import alias from './vite/alias'
import { parseEnv } from './vite/util'
import setupPlugins from './vite/plugins'
import { visualizer } from 'rollup-plugin-visualizer'

export default defineConfig(({ command, mode }) => {
    const isBuild = command == 'build'
    const env = parseEnv(loadEnv(mode, process.cwd()))
    console.log(mode);
    return {
        plugins: [...setupPlugins(isBuild, env), visualizer()],
        base: isBuild ? '/dist' : '',
        resolve: {
            alias,
        },
        build: {
            rollupOptions: {
                emptyOutDir: true,
                output: {
                    manualChunks(id: string) {
                        if (id.includes('node_modules')) {
                            id = id.toString().slice(id.toString().lastIndexOf('node_modules'))
                            return id.split('node_modules/')[1].split('/')[0].toString()
                        }
                    },
                },
            },
        },
        server: {
            proxy: {
                '/api': {
                    //将/api访问转换为target
                    target: 'http://hdcms-php.test/api',
                    //跨域请求携带cookie
                    changeOrigin: true,
                    //url 重写删除`/api`
                    rewrite: (path: string) => path.replace(/^\/api/, ''),
                },
            }
        }
    }
})
