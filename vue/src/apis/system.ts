import { http } from '@/plugins/axios'
import { isLogin } from '@/utils/helper'

export function getSystem() {
  if (isLogin()) {
    return http.request<SystemModel>({ url: 'system' }).then((r) => r.data)
  }
}

export function updateSystem(data: SystemModel) {
  return http.request({ url: 'system', method: 'PUT', data })
}

// export function getCommon() {
//   return http.request<Omit<SystemModel, 'config'>>({ url: 'system/common' }).then((r) => r.data)
// }
