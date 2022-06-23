import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/admin',
  component: () => import('@/layouts/system.vue'),
  meta: { auth: true },
  children: [
    {
      name: 'admin.index',
      path: ':sid',
      props: true,
      component: () => import('@/views/admin/index.vue'),
    },
    {
      name: 'admin.role',
      path: ':sid/:id',
      props: true,
      component: () => import('@/views/admin/role.vue'),
    },
  ],
} as RouteRecordRaw
