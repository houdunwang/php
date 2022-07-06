import * as api from '@@/apis/role'
import router from '@@/router'

export default () => {
  const roles = ref<ResponsePageResult<RoleModel>>()
  const role = ref<RoleModel>()
  const sid = router.currentRoute.value.params.sid as any

  const load = async (page: number = 1, params: any = {}) => {
    roles.value = await api.getRoleList(sid, page, params)
  }

  const del = async (model: RoleModel) => {
    await api.delRole(sid, model.id)
    load()
  }

  const add = async (model: RoleModel) => {
    await api.addRole(sid, model)
    router.push({ name: 'role.index' })
  }

  const update = async (model: RoleModel) => {
    await api.updateRole(sid, model)
    router.push({ name: 'role.index' })
  }

  const find = async (id: any) => {
    role.value = await api.roleFind(sid, id)
  }

  return { sid, roles, role, del, load, add, update, find }
}
