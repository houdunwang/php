import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/admin/site/:sid/admin',
  component: () => import('@/layouts/system.vue'),
  meta: { auth: true },
  children: [
    {
      name: 'admin.index',
      path: '',
      props: true,
      component: () => import('@/views/admin/index.vue'),
    },
    {
      name: 'admin.role',
      path: ':id',
      props: true,
      component: () => import('@/views/admin/role.vue'),
    },
  ],
} as RouteRecordRaw
