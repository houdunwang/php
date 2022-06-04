import { http } from '@/plugins/axios'

export function getUserList() {
  return http.request<UserModel[], ResponsePageResult<UserModel>>({
    url: `user`,
  })
}

export function apiInfo() {
  return http.request<UserModel>({
    url: `user/info`,
  })
}

export function getUser(id: string | string[]) {
  return http.request<UserModel>({
    url: `user/${id}`,
  })
}
