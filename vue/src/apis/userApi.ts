import { http } from '@/plugins/axios'

export function apiInfo() {
  return http.request<UserModel>({
    url: `user/info`,
  })
}
