import { http } from '@/plugins/axios'
export function getAdminList(site: string | number | string[], page = 1) {
  return http.request<UserModel, ResponsePageResult<UserModel>>({
    url: `site/${site}/admin?page=${page}`,
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
