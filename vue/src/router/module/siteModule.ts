import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/site/:sid',
  component: () => import('@/layouts/admin.vue'),
  meta: { auth: true },
  children: [
    {
      name: 'site.module',
      path: 'module',
      component: () => import('@/views/siteModule/set.vue'),
      props: true,
    },
  ],
} as RouteRecordRaw
