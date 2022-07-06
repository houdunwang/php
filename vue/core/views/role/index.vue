<script setup lang="ts">
import { roleTableColumns } from '@@/config/table'
import router from '@@/router'
import tab from './tab.vue'

const { sid } = defineProps<{ sid: any }>()
const { site, getBySid } = useSite()
const { del, roles, load } = useRole()

await Promise.all([load(), getBySid()])

const buttons = [
  {
    title: '编辑',
    type: 'success',
    permission: 'role-edit',
    action: (model: RoleModel) => router.push({ name: `role.edit`, params: { sid, id: model.id } }),
  },
  { title: '删除', type: 'danger', permission: 'role-del', action: (model: RoleModel) => del(model) },
] as TableButton[]
</script>

<template>
  <tab :site="site" />
  <CoreHdTableComponent
    :data="roles?.data"
    :columns="roleTableColumns"
    :button-width="210"
    :buttons="buttons"
    @search="load(1, $event)" />
</template>
