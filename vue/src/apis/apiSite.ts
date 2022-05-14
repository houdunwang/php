import { IUser } from './types/user'
import { http } from '@/plugins/axios'

export interface ISite {
  id: number
  title: string
  url: string
  tel: string
  address: string
  email: string
  config?: any
  user_id: number
  created_at: string
  updated_at: string
  user: IUser
}

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

export function apiSiteFind(id: number) {
  return http.request<ISite>({
    url: `/site/${id}`,
  })
}

export function apiSiteDelete(id: number) {
  return http.request({
    url: `/site/${id}`,
    method: 'DELETE',
  })
}
