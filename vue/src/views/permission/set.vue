<script setup lang="ts">
import { getSiteModuleList } from '@/apis/siteModule'
import { setRolePermissions } from '@/apis/role'
import TabVue from './tab.vue'
import { roleFind } from '@/apis/role'
import { updateSitePermission } from '@/apis/permission'

const router = useRouter()
const { sid, rid } = defineProps<{ sid: any; rid: any }>()

const [role, modules] = await Promise.all([roleFind(sid, rid), getSiteModuleList(sid)])

let permissions = $ref(role.permissions.map((p) => p.name))

const onSubmit = async () => {
  try {
    await setRolePermissions(sid, rid, permissions)
    router.push({ name: 'role.index' })
  } catch (error) {}
}
</script>

<template>
  <TabVue :role="role" :sid="sid" />
  <el-button type="warning" size="default" @click="updateSitePermission(sid)"> 更新权限表 </el-button>
  <div class="my-2">
    <el-alert
      title="如果权限表为空，意味着站点没有任何模块，请联系系统管理员安装模块"
      type="info"
      show-icon
      class="border"></el-alert>
  </div>

  <div class="bg-white p-3 border shadow-sm mb-3 rounded-md" v-for="module of modules.data">
    <dl v-for="permission of module.permissions" class="w-full">
      <dt class="text-gray-600 text-sm font-bold pb-2 border-b mb-3">{{ permission.title }}</dt>
      <dd class="grid md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-8 grid-cols-1 text-sm text-gray-600">
        <div v-for="p of permission.items" class="flex items-center">
          <label class="text-sm flex items-center">
            <input type="checkbox" v-model="permissions" :value="p.name" class="mr-1" />
            {{ p.title }}
          </label>
          <span class="text-xs text-gray-500">{{ p.name }}</span>
        </div>
      </dd>
    </dl>
  </div>

  <el-button type="primary" size="default" @click="onSubmit" v-if="modules.data.length">保存提交</el-button>
</template>

<style lang="scss"></style>
