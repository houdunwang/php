import { RouteRecordRaw } from 'vue-router'
export default {
  name: 'admin',
  path: '/admin',
  redirect: '/admin/site',
  component: () => import('@/layouts/admin.vue'),
  meta: { auth: true },
  children: [
    {
      name: 'site.index',
      path: 'site',
      component: () => import('@/views/site/index.vue'),
    },
    {
      name: 'site.add',
      path: 'site/add',
      component: () => import('@/views/site/add.vue'),
    },
  ],
} as RouteRecordRaw
