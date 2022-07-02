import { siteFind } from '@/apis/site'
import useSite from '@/composables/useSite'
import router from '@/router'
import errorStore from '@/store/errorStore'
import { access } from '@/utils/helper'
import { App } from 'vue'

export default function registerDirective(app: App) {
  //清除表单验证错误
  app.directive('clearError', {
    mounted(el: HTMLElement, binding) {
      el.addEventListener('focus', () => {
        errorStore().clearError(binding.value)
      })
    },
  })

  //权限判断
  app.directive('access', {
    async mounted(el: HTMLElement, binding) {
      let site: SiteModel
      if (binding.value instanceof Object) {
        site = binding.value
      } else if (typeof binding.value === 'number') {
        site = await siteFind(binding.value)
      } else {
        site = (await useSite()).site
      }

      const state = access(binding.arg as string, site)

      if (state === false) el.style.display = 'none'
    },
  })
}
