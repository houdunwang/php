import { getCommon } from '@/apis/system'
import { defineStore } from 'pinia'

export default defineStore('system', {
  state: () => {
    return {
      config: {} as Omit<SystemModel, 'config'>,
    }
  },
  actions: {
    async load() {
      this.config = await getCommon()
    },
  },
})
