import * as api from '@@/apis/rolePermission'
import router from '@@/router'

export default () => {
  const sid = router.currentRoute.value.params.sid as any

  const update = async (id: any, permissions: any[]) => {
    await api.updatePermission(sid, id, permissions)
  }

  return { sid, update }
}
