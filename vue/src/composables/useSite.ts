import { ElMessage } from 'element-plus'
import { apiSiteIndex, ISite, apiSiteDelete, apiSiteAdd, apiSiteUpdate, apiSiteInfo } from '@/apis/apiSite'
import _ from 'lodash'

export default () => {
  const field = reactive({ title: '标题', url: '链接', email: '邮箱', address: '地址' })

  const sites = ref<ISite[]>()
  const site = ref<ISite>(_.zipObject(Object.keys(field)) as any)

  const load = async (id?: number) => {
    if (id) {
      site.value = await apiSiteInfo(id).then((r) => r.data)
    } else {
      const { data } = await apiSiteIndex()
      sites.value = data
    }
  }

  const delSite = async (id: number) => {
    await apiSiteDelete(id)
    load()
  }

  const store = async () => {
    site.value.id ? await apiSiteUpdate(site.value) : await apiSiteAdd(site.value)
    ElMessage.success('站点保存成功')
  }

  return { load, store, delSite, sites, site, field }
}
