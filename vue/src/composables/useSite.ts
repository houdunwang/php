import { siteFind } from '@/apis/site'
import router from '@/router'
import { useRoute } from 'vue-router'

export default async function () {
  const route = router.currentRoute.value
  const site = $ref<SiteModel>(await siteFind(route.params.sid))

  return { site }
}
