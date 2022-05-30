import { http } from '@/plugins/axios'

export function systemInit() {
  return http.request<{ config: Record<string, any> }>({
    url: 'init',
    method: 'GET',
  })
}
