import { http } from '@/plugins/axios'

export function addSite(data: Record<string, any>) {
  return http.request({
    url: '/site',
    method: 'POST',
    data,
  })
}

export function updateSite(data: Record<string, any>) {
  return http.request({
    url: `/site/${data.id}`,
    method: 'PUT',
    data,
  })
}

export function getSiteList<ISite>() {
  return http.request<ISite[], ResponsePageResult<ISite>>({
    url: '/site',
  })
}

export async function getSite(id: any) {
  const { data } = await http.request<SiteModel>({
    url: `/site/${id}`,
  })
  return data
}

export function deleteSite(id: number) {
  return http.request({
    url: `/site/${id}`,
    method: 'DELETE',
  })
}
