import { http } from '@/plugins/axios'

export type SystemInitData = {
  config: { title: string; logo: string; copyright: string }
}
export function systemInit() {
  return http.request<SystemInitData>({
    url: 'init',
    method: 'GET',
  })
}
