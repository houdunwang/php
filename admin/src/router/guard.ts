import { CacheEnum } from './../enum/cacheEnum'
import userStore from '@/store/userStroe'
import util from '@/utils'
import { RouteLocationNormalized, Router } from 'vue-router'
import utils from '@/utils'

class Guard {
    constructor(private router: Router) { }

    public run() {
        this.router.beforeEach(this.beforeEach.bind(this))
    }

    private async beforeEach(to: RouteLocationNormalized, from: RouteLocationNormalized) {
        if (this.loginCheck(to) === false) return { name: 'login' }
        if (this.guestCheck(to) === false) return from

        document.title = import.meta.env.VITE_APPNAME + '-' + (to.meta.title || '管理后台')
    }

    private getUserInfo() {
        if (this.token()) return userStore().getUserInfo()
    }

    private token(): string | null {
        return util.store.get(CacheEnum.TOKEN_NAME)
    }

    //游客
    private guestCheck(route: RouteLocationNormalized) {
        return Boolean(!route.meta.guest || (route.meta.guest && !this.token()))
    }

    //登录用户访问
    private loginCheck(route: RouteLocationNormalized) {
        const state = Boolean(!route.meta.auth || (route.meta.auth && this.token()))
        if (state === false) {
            utils.store.set(CacheEnum.REDIRECT_ROUTE_NAME, route.name)
        }
        return state
    }
}

export default (router: Router) => {
    new Guard(router).run()
}
