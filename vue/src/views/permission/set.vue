<script setup lang="ts">
import { getSiteModuleList } from '@/apis/siteModule'
import { setRolePermissions } from '@/apis/role'
import TabVue from './tab.vue'
import { roleFind } from '@/apis/role'

const router = useRouter()
const { sid, rid } = defineProps<{ sid: any; rid: any }>()
console.log(sid, rid)
const [role, modules] = await Promise.all([roleFind(sid, rid), getSiteModuleList(sid)])

let permissions = $ref(role?.permissions?.map((p) => p.name))

const onSubmit = async () => {
  try {
    await setRolePermissions(rid, permissions)
    router.push({ name: 'role.index' })
  } catch (error) {}
}
</script>

<template>
  <TabVue :role="role" />
  <div class="bg-white p-3 border shadow-sm mb-3 rounded-md" v-for="module of modules.data">
    <dl v-for="permission of module.permissions" class="w-full">
      <dt class="text-gray-800 pb-2 border-b mb-3">{{ permission.title }}</dt>
      <dd class="grid grid-cols-4 text-sm text-gray-600">
        <div v-for="p of permission.items" class="flex items-center">
          <label>
            <input type="checkbox" v-model="permissions" :value="p.name" />
            {{ p.title }}
          </label>
          <span class="text-xs text-gray-500">{{ p.name }}</span>
        </div>
      </dd>
    </dl>
  </div>

  <el-button type="primary" size="default" @click="onSubmit">保存提交</el-button>
</template>

<style lang="scss"></style>
