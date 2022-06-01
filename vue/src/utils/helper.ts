import { ElMessage } from 'element-plus'
import { CacheEnum } from '@/enum/CacheEnum'
import router from '@/router'
import userStore from '@/store/userStore'
import useStore from '@/store/userStore'
import store from './store'
const storeUser = useStore()

export function is_super_admin() {
  return Boolean(storeUser.info?.is_super_admin)
}

/**
 * 登录与注册回调
 * @param data
 */
export function loginAndRegisterCallback(data: { token: string }) {
  store.set(CacheEnum.TOKEN_NAME, data.token)

  userStore().getUserInfo()

  const routeName = store.get(CacheEnum.REDIRECT_ROUTE_NAME) ?? 'home'

  router.push({ name: routeName })

  ElMessage({ type: 'success', message: '登录成功' })
}
