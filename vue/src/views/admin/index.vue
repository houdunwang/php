<script setup lang="ts">
import dayjs from 'dayjs'
import { syncSiteAdmin, getAdminList, removeSiteAdmin } from '@/apis/admin'
import { siteFind } from '@/apis/site'
import { userTableColumns } from '@/config/table'
import { ElMessageBox } from 'element-plus'
import TabVue from './tab.vue'

const router = useRouter()
const { sid } = defineProps<{ sid: any }>()
const site = $ref(await siteFind(sid))
let tableKey = $ref(0)

//设置管理员
// let admins = $ref(await getAdminList(sid))
const select = async (user: UserModel) => {
  await syncSiteAdmin(site.id, user.id)
  //   await getAdminList(sid)
  tableKey++
}

//用户加载API
const load = async (page: any, params: any) => {
  return getAdminList(sid, page, params)
}

const tableAction = async (model: UserModel, command: string) => {
  console.log(command)
  switch (command) {
    case 'setRole':
      router.push({ name: `admin.role`, params: { sid, id: model.id } })
      break
    case 'delAdmin':
      try {
        await ElMessageBox.confirm('确定删除吗')
        await removeSiteAdmin(sid, model.id)
        tableKey++
      } catch (error) {}
      break
  }
}
</script>

<template>
  <TabVue :site="site" />

  <UserSelectUser @select="select" class="mb-2" />

  <HdTableComponent
    :columns="userTableColumns"
    :api="load"
    :key="tableKey"
    search-field-name="name"
    @action="tableAction"
    :buttons="[
      { title: '设置角色', command: 'setRole' },
      { title: '删除管理员', command: 'delAdmin' },
    ]" />
</template>

<style lang="scss"></style>
