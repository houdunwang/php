import { ElMessage } from 'element-plus'
import { CacheEnum } from '@/enum/CacheEnum'
import router from '@/router'
import userStore from '@/store/userStore'
import useStore from '@/store/userStore'
import store from './store'
const storeUser = useStore()

//是否是超级管理员
export function isSuperAdmin() {
  return Boolean(storeUser.info?.is_super_admin)
}

/**
 * 是否登录
 * @returns boolean
 */
export function isLogin(): boolean {
  return !!store.get(CacheEnum.TOKEN_NAME)
}

//退出登录
export async function logout() {
  userStore().resetInfo()

  store.remove(CacheEnum.TOKEN_NAME)
  router.push({ name: 'home' })
}

/**
 * 登录与注册后记录token
 * @param data
 */
export async function loginAndRegisterCallback(data: { token: string }) {
  store.set(CacheEnum.TOKEN_NAME, data.token)

  await userStore().getUserInfo()

  const routeName = store.get(CacheEnum.REDIRECT_ROUTE_NAME) ?? 'home'
  router.push({ name: routeName })

  ElMessage({ type: 'success', message: '登录成功' })
}

//限制点击频繁请求
export function request(fn: (args: any) => Promise<any>) {
  let isSubmit = false
  return (args: any) => {
    if (isSubmit) return
    isSubmit = true
    return fn(args).finally(() => (isSubmit = false))
  }
}
