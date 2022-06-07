import { http } from '@/plugins/axios'

export function getUserList(page = 1, params: Record<any, any> = {}) {
  return http.request<UserModel[], ResponsePageResult<UserModel>>({
    url:
      `user?page=${page}&` +
      Object.entries(params)
        .map(([k, v]) => `${k}=${v}`)
        .join('&'),
  })
}

export function getCurrentUser() {
  return http.request<UserModel>({
    url: `user/currentUser`,
  })
}

export function getUser(id: string | string[]) {
  return http.request<UserModel>({
    url: `user/${id}`,
  })
}
