import { DashboardOne } from '@icon-park/vue-next'
import { RouteRecordRaw } from 'vue-router'
export default {
  name: 'admin',
  path: '/admin',
  redirect: '/admin/index',
  component: () => import('@@/layouts/admin.vue'),
  meta: { auth: true, menu: { title: 'Dashboard', icon: DashboardOne } },
  children: [
    {
      name: 'admin.index',
      path: 'index',
      component: () => import('@@/admin/home/index.vue'),
      meta: { menu: { title: '工作台' } },
    },
    {
      name: 'admin.wangEditor',
      path: 'wangEditor',
      component: () => import('@@/admin/editor/wangeditor.vue'),
      meta: { menu: { title: '富文本编辑器' } },
    },
    {
      name: 'admin.markdown',
      path: 'markdown',
      component: () => import('@@/admin/editor/markdown.vue'),
      meta: { menu: { title: 'Markdown' } },
    },
  ],
} as RouteRecordRaw
