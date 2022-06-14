import { http } from '@/plugins/axios'

export function updateSitePermission(id: number) {
  return http.request({
    url: `site/${id}/update_site_permission`,
  })
}
