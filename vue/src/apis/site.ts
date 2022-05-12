import { http } from '@/plugins/axios'

// export interface ISiteAddForm {
//   title: string
//   url: string
//   email: string
//   address: string
// }

export function apiSiteAdd(data: Record<string, any>) {
  return http.request({
    url: '/site',
    method: 'POST',
    data,
  })
}

export interface ISite {
  title: string
  url: string
  email: string
  address: string
  created_at?: string
}

export function apiSiteIndex() {
  return http.request<ISite[]>({
    url: '/site',
  })
}
