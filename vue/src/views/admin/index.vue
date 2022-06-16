<script setup lang="ts">
import dayjs from 'dayjs'
import { syncSiteAdmin, getAdminList, removeSiteAdmin } from '@/apis/admin'
import { siteFind } from '@/apis/site'
import { userTableColumns } from '@/config/table'
import { ElMessageBox } from 'element-plus'
import TabVue from './tab.vue'
const { sid } = defineProps<{ sid: any }>()

const site = $ref(await siteFind(sid))
let admins = $ref(await getAdminList(sid))

const select = async (user: UserModel) => {
  await syncSiteAdmin(site.id, user.id)
  admins = await getAdminList(sid)
}

const del = async (model: any) => {
  try {
    await ElMessageBox.confirm('确定删除吗')
    await removeSiteAdmin(sid, model.id)
    admins = await getAdminList(sid)
  } catch (error) {}
}
</script>

<template>
  <TabVue :site="site" />

  <UserSelectUser @select="select" class="mb-2" />

  <el-table :data="admins.data" border stripe>
    <el-table-column
      v-for="col in userTableColumns"
      :prop="col.prop"
      :key="col.prop"
      :label="col.label"
      :width="col.width"
      :align="col.align"
      #default="{ row }">
      <template v-if="col.type == 'image'">
        <hd-image-component :url="row[col.prop]" class="rounded-md w-12 self-center block m-auto" />
      </template>
      <template v-else-if="col.type == 'date'">
        {{ dayjs(row[col.prop]).format('YYYY-mm-DD') }}
      </template>
      <template v-else>
        {{ row[col.prop] }}
      </template>
    </el-table-column>
    <el-table-column label="角色" #default="{ row: model }">
      <el-tag type="success" size="small" effect="dark" v-for="r of model.roles" class="m-1">
        {{ r.title }}
      </el-tag>
    </el-table-column>

    <el-table-column #default="{ row: model }" :width="180" align="center">
      <el-button-group>
        <el-button
          type="primary"
          size="default"
          @click="$router.push({ name: `admin.role`, params: { sid, id: model.id } })">
          设置角色
        </el-button>
        <el-button type="danger" size="default" @click="del(model)">删除</el-button>
      </el-button-group>
    </el-table-column>
  </el-table>
</template>

<style lang="scss"></style>
