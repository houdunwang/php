<script setup lang="ts">
import { delRole, getRoleList } from '@/apis/role'
import { roleTableColumns } from '@/config/table'
import { ElMessageBox } from 'element-plus'
import tab from './tab.vue'
const { sid } = defineProps<{ sid: any }>()

const getRoles = async (page: number = 1) => {
  return await getRoleList(sid, page)
}
let tableKey = $ref(0)
const del = async (model: RoleModel) => {
  try {
    await ElMessageBox.confirm('确认删除该角色吗？')
    await delRole(model.id)
    tableKey++
  } catch (error) {}
}
</script>

<template>
  <tab />
  <el-button type="primary" size="default" @click="$router.push({ name: 'role.add', params: { sid } })">
    添加角色
  </el-button>

  <HdTableComponent :api="getRoles" :columns="roleTableColumns" :button-width="150" :key="tableKey" class="mt-2">
    <template #button="{ model }">
      <el-button-group>
        <el-button
          type="primary"
          size="default"
          @click="$router.push({ name: `role.edit`, params: { sid, id: model.id } })">
          编辑
        </el-button>
        <el-button type="danger" size="default" @click="del(model)">删除</el-button>
      </el-button-group>
    </template>
  </HdTableComponent>
</template>

<style lang="scss"></style>
