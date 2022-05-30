import { systemInit } from '@/apis/commonApi'
import { defineStore } from 'pinia'

export default defineStore('system', {
  state: () => {
    return {
      config: {} as { [x: string]: any },
    }
  },
  actions: {
    async load() {
      const data = await systemInit().then((r) => r.data)

      this.config = data.config
    },
  },
})
