<script setup lang="ts">
import { roleFind, updateRole } from '@/apis/role'
import { roleForm } from '@/config/form'
import TabVue from './tab.vue'

const { id } = defineProps<{ id: any }>()

const role = reactive(await roleFind(id))

const onSubmit = async (model: RoleModel) => {
  await updateRole(model)
}
</script>

<template>
  <TabVue />
  <FormFieldList :fields="roleForm" :model="role" @submit="onSubmit" />
</template>

<style lang="scss"></style>
