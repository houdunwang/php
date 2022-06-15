<script setup lang="ts">
import { delRole, getRoleList } from '@/apis/role'
import { roleTableColumns } from '@/config/table'
import { ElMessageBox } from 'element-plus'
import tab from './tab.vue'
const { sid } = defineProps<{ sid: any }>()
let roles = $ref(await getRoleList(sid, 1))

const del = async (model: RoleModel) => {
  try {
    await ElMessageBox.confirm('确认删除该角色吗？')
    await delRole(sid, model.id)
    roles = await getRoleList(sid)
  } catch (error) {}
}
</script>

<template>
  <tab />
  <el-table :data="roles.data" border stripe>
    <el-table-column
      v-for="col in roleTableColumns"
      :prop="col.prop"
      :key="col.prop"
      :label="col.label"
      :width="col.width">
    </el-table-column>
    <el-table-column label="权限" #default="{ row: model }" :width="250" align="center">
      <el-tag type="success" size="small" effect="dark" v-for="p of model.permissions" class="m-1">
        {{ p.title }}
      </el-tag>
    </el-table-column>
    <el-table-column #default="{ row: model }" :width="250" align="center">
      <el-button-group>
        <el-button
          type="primary"
          size="default"
          @click="$router.push({ name: `role.edit`, params: { sid, rid: model.id } })">
          编辑
        </el-button>
        <el-button type="danger" size="default" @click="del(model)">删除</el-button>
        <el-button
          type="success"
          size="default"
          @click="$router.push({ name: 'permission.set', params: { rid: model.id } })"
          >设置权限</el-button
        >
      </el-button-group>
    </el-table-column>
  </el-table>
</template>

<style lang="scss"></style>
