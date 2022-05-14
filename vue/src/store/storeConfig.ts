import { defineStore } from 'pinia'
export default defineStore('config', {
  state() {
    return {
      config: [] as Record<string, any>,
    }
  },
  actions: {
    loadSystemConfig() {
      //   this.config = config
    },
  },
})
