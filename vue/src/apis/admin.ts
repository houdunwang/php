import { http } from '@/plugins/axios'

export function getAdminList(site: string | number | string[], page = 1, params = {}) {
  return http.request<UserModel, ResponsePageResult<UserModel>>({
    url:
      `site/${site}/admin?page=${page}&` +
      Object.entries(params)
        .map(([k, v]) => `${k}=${v}`)
        .join('&'),
  })
}

export async function syncSiteAdmin(siteId: number, user_id: number) {
  return http.request({
    url: `site/${siteId}/admin`,
    method: 'POST',
    data: { user_id },
  })
}

export async function removeSiteAdmin(siteId: number, userId: number) {
  return http.request({
    url: `site/${siteId}/admin/${userId}`,
    method: 'DELETE',
  })
}

export async function adminFind(id: any) {
  return http
    .request<UserModel>({
      url: `admin/${id}`,
    })
    .then((r) => r.data)
}

export async function syncAdminRole(id: number, roles: string[]) {
  return http.request({
    url: `admin/${id}/role`,
    method: 'POST',
    data: { roles },
  })
}
