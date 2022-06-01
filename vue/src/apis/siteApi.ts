import { http } from '@/plugins/axios'

export function apiSiteAdd(data: Record<string, any>) {
  return http.request({
    url: '/site',
    method: 'POST',
    data,
  })
}

export function apiSiteUpdate(data: Record<string, any>) {
  return http.request({
    url: `/site/${data.id}`,
    method: 'PUT',
    data,
  })
}

export function apiSiteGet<ISite>() {
  return http.request<ISite[], ResponsePageResult<ISite>>({
    url: '/site',
  })
}

export function apiSiteFind(id: string | string[]) {
  return http.request<SiteModel>({
    url: `/site/${id}`,
  })
}

export function apiSiteDelete(id: number) {
  return http.request({
    url: `/site/${id}`,
    method: 'DELETE',
  })
}
