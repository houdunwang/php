import { CacheEnum } from '../enum/CacheEnum'
import store from '@/utils/store'
import { defineStore } from 'pinia'
import { currentUserInfo } from '@/apis/user'

export default defineStore('userStore', {
  state: () => {
    return {
      info: {} as null | UserModel,
      permissions: [] as PermissionModel[],
    }
  },
  actions: {
    async getUserInfo() {
      this.info = await currentUserInfo()

      this.permissions = this.info.roles.reduce((permissions: PermissionModel[], role: RoleModel) => {
        permissions.push(...role.permissions)
        return permissions
      }, [])
    },
    resetInfo() {
      this.info = null
      this.permissions = []
    },
  },
})
