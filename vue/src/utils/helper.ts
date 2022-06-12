import { RouteEnum } from './../enum/RouteEnum'
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
  store.remove(CacheEnum.TOKEN_NAME)
  location.href = '/'
}

/**
 * 登录与注册后记录token
 * @param data
 */
export async function loginAndRegisterCallback(data: { token: string }) {
  store.set(CacheEnum.TOKEN_NAME, data.token)
  store.remove(CacheEnum.REDIRECT_ROUTE_NAME)

  location.href = store.get(CacheEnum.REDIRECT_ROUTE_NAME, '/')
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

export function isMobile() {
  return document.documentElement.clientWidth < 768
}
