<script setup lang="ts">
import { roleFind } from '@/apis/role'

const route = useRoute()
const role = await roleFind(route.params.rid)
</script>

<template>
  <HdTab
    :tabs="[
      { label: `返回角色列表`, route: { name: 'role.index', params: { sid: route.params.sid } } },
      { label: `【${role.title}】角色权限设置`, route: { name: 'permission.set' } },
    ]" />
</template>

<style lang="scss"></style>
