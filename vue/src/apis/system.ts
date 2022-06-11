import { http } from '@/plugins/axios'
import { isLogin } from '@/utils/helper'

export function getSystem() {
  return http.request<SystemModel>({ url: 'system' }).then((r) => r.data)
}

export function updateSystem(data: SystemModel) {
  return http.request({ url: 'system', method: 'PUT', data })
}
