import { Router, RouteRecordRaw } from 'vue-router'
import userStore from '@/store/userStore'

function autoloadModuleRoutes() {
  const modules = import.meta.globEager('./module/**/*.ts')
  const routes = [] as RouteRecordRaw[]

  Object.keys(modules).forEach((key) => {
    routes.push(modules[key].default)
  })

  return routes
}

export default function (router: Router) {
  const user = userStore()
  const routes = autoloadModuleRoutes().map((route) => {
    //根据权限过滤
    route.children = route.children?.filter((r) => {
      const permission = r.meta?.permission
      return permission ? user.permissions.find((p) => p.name == permission) : true
    })
    return route
  })

  routes.forEach((r) => router.addRoute(r))
}