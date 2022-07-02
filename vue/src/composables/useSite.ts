import { siteFind } from '@/apis/site'

export default async function () {
  const route = useRoute()
  const site = $ref<SiteModel>(await siteFind(route.params.sid))

  return { site }
}
