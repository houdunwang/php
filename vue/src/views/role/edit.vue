<script setup lang="ts">
import { roleFind, updateRole } from '@/apis/role'
import { roleForm } from '@/config/form'
import TabVue from './tab.vue'
const router = useRouter()
const { sid, rid } = defineProps<{ sid: any; rid: any }>()

const role = reactive(await roleFind(sid, rid))

const onSubmit = async (model: RoleModel) => {
  try {
    await updateRole(sid, model)
    router.push({ name: 'role.index' })
  } catch (error) {}
}
</script>

<template>
  <TabVue />
  <FormFieldList :fields="roleForm" :model="role" @submit="onSubmit" />
</template>

<style lang="scss"></style>
