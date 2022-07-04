import { defineConfig, loadEnv } from 'vite'
import alias from './vite/alias'
import { parseEnv } from './vite/util'
import setupPlugins from './vite/plugins'
import { visualizer } from 'rollup-plugin-visualizer'
import vue from '@vitejs/plugin-vue'

export default defineConfig(({ command, mode }) => {
  const isBuild = command == 'build'
  const env = parseEnv(loadEnv(mode, process.cwd()))

  return {
    plugins: [vue({ reactivityTransform: true }), ...setupPlugins(isBuild, env), visualizer()],
    //静态文件 url 前缀
    base: isBuild ? '/system/' : '/',
    resolve: {
      alias,
    },
    build: {
      //编译文件生成目录
      outDir: 'dist',
      emptyOutDir: true,
      rollupOptions: {
        output: {
          manualChunks(id: string) {
            if (id.includes('node_modules')) {
              return id.split('/node_modules/').pop()?.split('/')[0]
            }
          },
        },
      },
    },
    server: {
      proxy: {
        '/api': {
          target: env.VITE_API_URL,
          changeOrigin: true,
        },
        '/captcha/api/math': {
          target: env.VITE_API_URL,
          changeOrigin: true,
        },
      },
    },
  }
})
