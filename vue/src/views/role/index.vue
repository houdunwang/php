<script setup lang="ts">
import { delRole, getRoleList } from '@/apis/role'
import { roleTableColumns } from '@/config/table'
import { ElMessageBox } from 'element-plus'
import tab from './tab.vue'

let tableKey = $ref(0)

const { sid } = defineProps<{ sid: any }>()
const { site } = await useSite()
const router = useRouter()

const load = async (page: number = 1, params: any) => {
  return getRoleList(sid, page, params)
}

const tableButtonAction = async (model: RoleModel, command: string) => {
  switch (command) {
    case 'del':
      await ElMessageBox.confirm('确认删除该角色吗？')
      await delRole(site.id, model.id)
      tableKey++
      break
    case 'edit':
      router.push({ name: `role.edit`, params: { sid, rid: model.id } })
      break
    case 'permissions':
      router.push({ name: 'role.permission.edit', params: { sid, rid: model.id } })
      break
  }
}
</script>

<template>
  <tab :site="site" />
  <hd-table-component
    :key="tableKey"
    :columns="roleTableColumns"
    :api="load"
    @action="tableButtonAction"
    :button-width="160">
    <template #button="{ model }">
      <el-button-group>
        <el-button
          type="primary"
          size="default"
          @click="$router.push({ name: `role.edit`, params: { sid, rid: model.id } })">
          编辑
        </el-button>
        <site-permission :sid="sid" :rid="model.id" @submit="tableKey++" />
      </el-button-group>
    </template>
  </hd-table-component>
</template>

<style lang="scss"></style>
