import { systemInit } from '@/apis/commonApi'
import { defineStore } from 'pinia'

export default defineStore('system', {
  state: () => {
    return {
      config: {} as { [x: string]: any; title: string; logo: string },
    }
  },
  actions: {
    async load() {
      const { data } = await systemInit()
      this.config = data.config as any
    },
  },
})
