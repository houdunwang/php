import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/admin',
  component: () => import('@/layouts/admin.vue'),
  meta: { auth: true },
  children: [
    {
      name: 'admin.index',
      path: ':id',
      component: () => import('@/views/admin/index.vue'),
    },
  ],
} as RouteRecordRaw
