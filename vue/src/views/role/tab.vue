<script setup lang="ts">
const route = useRoute()
const sid = route.params.sid
</script>

<template>
  <HdTab
    :tabs="[
      { label: '站点列表', route: { name: 'site.index' } },
      { label: '角色列表', route: { name: 'role.index', params: { sid } } },
      { label: '添加角色', route: { name: 'role.add' } },
      { label: '编辑角色', route: { name: 'role.edit' }, current: true },
    ]" />
</template>

<style lang="scss"></style>
