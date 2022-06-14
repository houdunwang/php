<script setup lang="ts">
import { syncSiteAdmin, getAdminList, removeSiteAdmin } from '@/apis/admin'
import { siteFind } from '@/apis/site'
import { userTableColumns } from '@/config/table'
import { ElMessageBox } from 'element-plus'
import TabVue from './tab.vue'
const { sid } = defineProps<{ sid: any }>()
const router = useRouter()

const site = await siteFind(sid)

const getList = async (page: number = 1, params = {}) => {
  return await getAdminList(site.id, page, params)
}
const tableComponentKey = ref(1)

const select = (user: UserModel) => {
  syncSiteAdmin(site.id, user.id)
  tableComponentKey.value++
}

const action = async (model: any, command: string) => {
  try {
    switch (command) {
      case 'remove':
        await ElMessageBox.confirm('确定删除吗')
        await removeSiteAdmin(sid, model.id)
        tableComponentKey.value++
        break
      case 'role':
        router.push({ name: 'admin.role', params: { sid, id: model.id } })
    }
  } catch (error) {}
}
</script>

<template>
  <TabVue :site="site" />

  <UserSelectUser @select="select" class="mb-2" />

  <HdTableComponent
    :api="getList"
    :columns="userTableColumns"
    :key="tableComponentKey"
    :buttons="[
      { title: '移除', command: 'remove', type: 'danger' },
      { title: '设置角色', command: 'role', type: 'primary' },
    ]"
    search-field-name="name"
    @action="action" />
</template>

<style lang="scss"></style>
