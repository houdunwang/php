import { ElMessage } from 'element-plus'
import { apiSiteDelete } from '@/apis/apiSite'
import _ from 'lodash'

interface IField {
  name: string
  title: string
  form?: string
}

export default <T = Record<string, any>>(fields: IField[] = []) => {
  type IModel = T & { id?: number }

  //分布数据
  const collection = ref<ResponsePageResult<T>>()
  //单条数据
  const model = ref<IModel>(
    _.zipObject(
      fields.map((item) => item.name),
      fields.map((r) => ''),
    ) as unknown as IModel,
  )

  //加载分页数据
  const load = async (api: () => Promise<ResponsePageResult<IModel>>) => {
    collection.value = await api()
  }

  //单条资源
  const find = async (api: (id: number) => Promise<ResponseResult<IModel>>, id: number) => {
    model.value = await api(id).then((r) => r.data)
  }

  //删除站点
  const remove = async (id: number) => {
    await apiSiteDelete(id)
  }

  //添加更新站点
  const post = async <IModel>(api: (data: IModel) => Promise<ResponseResult<IModel>>) => {
    await api(model.value)
    ElMessage.success(model.value.id ? '更新成功' : '添加成功')
  }

  return { load, post, remove, collection, model, find }
}
