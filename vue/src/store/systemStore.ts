import { SystemInitData } from './../apis/commonApi'
import { systemInit } from '@/apis/commonApi'
import { defineStore } from 'pinia'

export default defineStore('system', {
  state: () => {
    return {
      data: {} as SystemInitData,
    }
  },
  actions: {
    async load() {
      const { data } = await systemInit()
      this.data = data
    },
  },
})
