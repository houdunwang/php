import { RouteRecordRaw } from 'vue-router'
export default {
  name: 'admin',
  path: '/Blog/admin',
  redirect: { name: 'article.index' },
  component: () => import('@@/layouts/admin.vue'),
  children: [
    {
      path: 'article',
      name: 'article.index',
      component: () => import('@/views/article/index.vue'),
    },
  ],
} as RouteRecordRaw
