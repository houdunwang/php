import { RouteRecordRaw } from 'vue-router'
export default {
  name: 'permission',
  path: '/permission',
  component: () => import('@/layouts/admin.vue'),
  meta: { auth: true },
  children: [
    {
      name: 'permission.set',
      path: ':sid/:rid',
      component: () => import('@/views/permission/set.vue'),
      props: true,
    },
  ],
} as RouteRecordRaw
