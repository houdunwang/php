import { ILoginData } from './../apis/userApi'
import userApi from '@/apis/userApi'
import { CacheEnum } from '@/enum/cacheEnum'
import store from './store'
import router from '@/router'
import userStroe from '@/store/userStroe'
import { http } from '@/plugins/axios'

export function isLogin(): boolean {
  return !!store.get(CacheEnum.TOKEN_NAME)
}

export async function login(values: ILoginData) {
  const {
    data: { user, token },
  } = await userApi.login(values)
  store.set(CacheEnum.TOKEN_NAME, token)

  userStroe().info = user

  const routeName = store.get(CacheEnum.REDIRECT_ROUTE_NAME) ?? 'home'

  router.push({ name: routeName })
}

export async function logout() {
  console.log(store.get(CacheEnum.TOKEN_NAME))
  await http.request({ url: 'logout', method: 'get' })

  userStroe().info = null
  store.remove(CacheEnum.TOKEN_NAME)
  router.push({ name: 'home' })
}
