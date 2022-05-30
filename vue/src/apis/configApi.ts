import { http } from '@/plugins/axios'

export function getConfig() {
  return http.request<Record<string, string>>({
    url: 'config/system',
    method: 'GET',
  })
}

export function updateConfig(data: Record<string, string>) {
  return http.request({
    url: 'config/system',
    method: 'PUT',
    data,
  })
}
