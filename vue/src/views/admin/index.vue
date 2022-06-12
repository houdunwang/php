<script setup lang="ts">
import { syncSiteAdmin, getAdminList, removeSiteAdmin } from '@/apis/admin'
import { getSite } from '@/apis/site'
import { userTableColumns } from '@/config/table'
import { ElMessageBox } from 'element-plus'
const route = useRoute()

const site = await getSite(route.params.id)

const getList = async (page: number = 1, params = {}) => {
  return await getAdminList(site.id, page, params)
}
const tableComponentKey = ref(1)

const select = (user: UserModel) => {
  syncSiteAdmin(site.id, user.id)
  tableComponentKey.value++
}

const action = async (model: any) => {
  try {
    await ElMessageBox.confirm('确定删除吗')
    await removeSiteAdmin(site.id, model.id)
    tableComponentKey.value++
  } catch (error) {}
}
</script>

<template>
  <HdTab
    :tabs="[
      { label: '站点列表', route: { name: 'site.index' } },
      { label: `【${site.title}】管理员列表`, route: { name: 'admin.index' } },
    ]" />

  <UserSelect @select="select" class="mb-2" />

  <HdTableComponent
    :api="getList"
    :columns="userTableColumns"
    :key="tableComponentKey"
    :buttons="[{ title: '移除', command: 'remove' }]"
    search-field-name="name"
    @action="action" />
</template>

<style lang="scss"></style>
