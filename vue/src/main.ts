import { App as AppType, createApp } from 'vue'
import App from './App.vue'
import router, { setupRouter } from '@/router'
import { setupPlugins } from './plugins'
import '@/styles/global.scss'
import 'animate.css'
import registerDirective from './directive'

class Main {
  public async bootstrap() {
    const app = this.app()
    await router.isReady()
    const meta = document.createElement('meta')
    meta.name = 'naive-ui-style'
    document.head.appendChild(meta)
    app.mount('#app')
  }
  //初始应用
  private app(): AppType {
    const app = createApp(App)
    setupPlugins(app)
    setupRouter(app)
    registerDirective(app)
    return app
  }
}

new Main().bootstrap()
