<script setup lang="ts">
const { role } = defineProps<{ role: RoleModel }>()
</script>

<template>
  <HdTab
    :tabs="[
      { label: `返回角色列表`, route: { name: 'role.index', params: { sid: role.id } } },
      { label: `【${role.title}】角色权限设置`, route: { name: 'permission.set' } },
    ]" />
</template>

<style lang="scss"></style>
