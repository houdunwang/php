import { ElMessage } from 'element-plus'
import { apiSiteIndex, ISite, apiSiteDelete, apiSiteAdd, apiSiteUpdate, apiSiteInfo } from '@/apis/apiSite'
import _ from 'lodash'

export default () => {
  //字段配置
  const field = reactive({ title: '标题', url: '链接', email: '邮箱', address: '地址' })

  //站点列表
  const collection = ref<ISite[]>()
  const model = ref<ISite>(_.zipObject(Object.keys(field)) as any)

  //加载站点列表或单个站点
  const load = async (id?: number) => {
    if (id) {
      model.value = await apiSiteInfo(id).then((r) => r.data)
    } else {
      const { data } = await apiSiteIndex()
      collection.value = data
    }
  }

  //删除站点
  const remove = async (id: number) => {
    await apiSiteDelete(id)
    load()
  }

  //添加更新站点
  const store = async () => {
    model.value.id ? await apiSiteUpdate(model.value) : await apiSiteAdd(model.value)
    ElMessage.success('站点保存成功')
  }

  return { load, store, remove, collection, model, field }
}
