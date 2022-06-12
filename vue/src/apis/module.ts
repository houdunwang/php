import { http } from '@/plugins/axios'
import { urlToHttpOptions } from 'url'

export function getModuleList(page = 1, params = {}) {
  return http.request<ModuleModel, ResponsePageResult<ModuleModel>>({
    url:
      `module?page=${page}&` +
      Object.entries(params)
        .map((item) => item.join('='))
        .join('&'),
  })
}

export function delModule(moduleId: number) {
  return http.request({
    url: `module/${moduleId}`,
    method: 'DELETE',
  })
}

export function addModule(module: ModuleModel) {
  console.log(module)
  return http.request({
    url: `module`,
    data: module,
    method: 'POST',
  })
}
