import { http } from '@/plugins/axios'

export function getUserList(page = 1) {
  return http.request<UserModel[], ResponsePageResult<UserModel>>({
    url: `user?page=${page}`,
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
