import userStore from '@/store/userStroe'
import { App } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import routes from './routes'
import autoload from './autoload'
import guard from './guard'
import utils from '@/utils'

const router = createRouter({
    history: createWebHistory(),
    routes: [...routes],
})

export async function setupRouter(app: App) {
    if (utils.user.isLogin()) {
        await userStore().getUserInfo()
    }
    autoload(router)
    guard(router)
    app.use(router)
}

export default router
