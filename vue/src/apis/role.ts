import { http } from '@/plugins/axios'

export function getRoleList(siteId: number, page = 1, params = {}) {
  return http.request<RoleModel, ResponsePageResult<RoleModel>>({
    url:
      `/site/${siteId}}/role?page=${page}&` +
      Object.entries(params)
        .map((e) => e.join('='))
        .join('&'),
    method: 'get',
  })
}

export function addRole(siteId: number, data: any) {
  return http.request({
    url: `site/${siteId}/role`,
    method: 'POST',
    data,
  })
}

export function delRole(id: number) {
  return http.request({
    url: `role/${id}`,
    method: 'DELETE',
  })
}

export function updateRole(role: RoleModel) {
  return http.request({
    url: `role/${role.id}`,
    method: 'PUT',
    data: role,
  })
}

export function roleFind(id: any) {
  return http.request<RoleModel>({ url: `role/${id}` }).then((r) => r.data)
}

//设置角色权限
export function setRolePermissions(rid: any, permissions: any[]) {
  return http.request({
    url: `role/${rid}/permission`,
    method: 'POST',
    data: { permissions },
  })
}
