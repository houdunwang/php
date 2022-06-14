import { http } from '@/plugins/axios'

export function syncSiteCache(siteId: number) {
  return http.request({
    url: `cache/${siteId}`,
  })
}
