import { RouteRecordRaw } from 'vue-router'
import { ref } from 'vue'
import router from '@@/router'

const routes = router
  .getRoutes()
  .filter((r) => r.children.length)
  .filter((r) => r.meta.menu)
const show = ref(true)

const history = ref<RouteRecordRaw[]>([])

export default () => {
  //路由跳转
  const go = (route: RouteRecordRaw) => {
    if (history.value.length == 20) history.value.pop()
    history.value.unshift(route)
    router.push(route)
  }
  return { routes, show, go, history }
}
