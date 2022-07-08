import { DashboardOne } from '@icon-park/vue-next'
import { RouteRecordRaw } from 'vue-router'
export default {
  name: 'admin',
  path: '/Blog/admin',
  component: () => import('@@/layouts/admin.vue'),
  meta: { order: 1, auth: true, menu: { title: 'Dashboard', icon: DashboardOne } },
  children: [
    {
      name: 'admin.index',
      path: '',
      component: () => import('@/views/admin/article/index.vue'),
      meta: { menu: { title: '文章列表' } },
    },
  ],
} as RouteRecordRaw
