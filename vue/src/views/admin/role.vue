<script setup lang="ts">
import { siteFind } from '@/apis/site'
import { adminFind, syncAdminRole } from '@/apis/admin'
import { getRoleList } from '@/apis/role'
import TabVue from './tab.vue'

const router = useRouter()

const { sid, id } = defineProps<{ sid: any; id: any }>()
const site = await siteFind(sid)
const admin = await adminFind(sid, id)
console.log(admin)
const response = await getRoleList(sid, 1)
const roles = $ref(admin.roles.map((r) => r.name))
const onSubmit = async () => {
  try {
    await syncAdminRole(id, roles)
    router.push({ name: 'admin.index', params: { sid } })
  } catch (error) {}
}
</script>

<template>
  <TabVue :site="site" :admin="admin" />

  <div class="bg-white p-3 border rounded-md mb-3">
    <label v-for="r of response.data" class="m-2 text-gray-700 text-sm inline-flex items-center">
      <input type="checkbox" class="mr-1" v-model="roles" :value="r.name" />
      {{ r.title }}
    </label>
  </div>
  <el-button type="primary" size="default" @click="onSubmit">保存提交</el-button>
</template>

<style lang="scss"></style>
