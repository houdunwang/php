import { http } from '@/plugins/axios'

export function getSiteModuleList(sid: any) {
  return http.request<ModuleModel, ResponsePageResult<ModuleModel>>({
    url: `site/${sid}/module`,
  })
}

export function addSiteModule(sid: any, mid: any) {
  return http.request({
    url: `site/${sid}/module`,
    method: 'POST',
    data: { mid },
  })
}

export function removeSiteModule(sid: any, mid: any) {
  return http.request({
    url: `site/${sid}/module/${mid}`,
    method: 'DELETE',
  })
}

export function setSiteDefaultModule(sid: any, mid: any) {
  return http.request({
    url: `set_default_module/site/${sid}/module/${mid}`,
  })
}
