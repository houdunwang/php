import { http } from '@/plugins/axios'

export function getConfig() {
  return http.request<ConfigModel>({
    url: 'config/system',
    method: 'GET',
  })
}

export function updateConfig(data: ConfigModel) {
  return http.request({
    url: 'config/system',
    method: 'PUT',
    data,
  })
}
