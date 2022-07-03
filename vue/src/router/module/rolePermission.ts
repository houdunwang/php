import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/system/site/:sid/role/:rid',
  component: () => import('@/layouts/system.vue'),
  meta: { auth: true },
  children: [
    {
      name: 'role.permission.edit',
      path: 'permission',
      component: () => import('@/views/rolePermission/edit.vue'),
      props: true,
    },
  ],
} as RouteRecordRaw
