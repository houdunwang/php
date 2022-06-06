import { CacheEnum } from '../enum/CacheEnum'
import store from '@/utils/store'
import { defineStore } from 'pinia'
import { getCurrentUser } from '@/apis/user'

export default defineStore('userStore', {
  state: () => {
    return {
      info: {} as null | UserModel,
    }
  },
  actions: {
    async getUserInfo() {
      if (store.get(CacheEnum.TOKEN_NAME)) {
        this.info = await getCurrentUser().then((r) => r.data)
      }
    },
    resetInfo() {
      this.info = null
    },
  },
})
