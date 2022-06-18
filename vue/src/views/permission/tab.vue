<script setup lang="ts">
const { role, sid } = defineProps<{ role: RoleModel; sid: any }>()
</script>

<template>
  <HdTab
    :tabs="[
      { label: `返回角色列表`, route: { name: 'role.index', params: { sid } } },
      { label: `【${role.title}】角色权限设置`, route: { name: 'permission.set' } },
    ]" />
</template>

<style lang="scss"></style>
