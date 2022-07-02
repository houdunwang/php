<script setup lang="ts">
const { site, role } = defineProps<{ site: SiteModel; role?: any }>()
</script>

<template>
  <HdTab
    :tabs="[
      { label: '站点列表', route: { name: 'site.index' } },
      {
        label: '角色列表',
        route: { name: 'role.index', params: { sid: site.id } },
        permission: { name: 'role-list', site },
      },
      {
        label: '添加角色',
        route: { name: 'role.add', params: { sid: site.id } },
        permission: { name: 'role-add', site },
      },
      {
        label: `编辑【${role?.title}】角色`,
        route: { name: 'role.edit' },
        current: true,
        permission: { name: 'edit-list', site },
      },
      {
        label: `设置【${role?.title}】角色权限`,
        route: { name: 'role.permission' },
        current: true,
        permission: { name: 'role-permission-set', site },
      },
      {
        label: '管理员列表',
        route: { name: 'admin.index', params: { sid: site.id } },
        permission: { name: 'admin-list', site },
      },
    ]" />
</template>

<style lang="scss"></style>
