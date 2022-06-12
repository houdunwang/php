import { getSystem } from '@/apis/system'
import { defineStore } from 'pinia'

export default defineStore('system', {
  state: () => {
    return {
      config: {} as SystemModel['config'],
    }
  },
  actions: {
    async load() {
      this.config = await getSystem()?.then((r) => r.config)
    },
  },
})
