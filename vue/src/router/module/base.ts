import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/',
  component: () => import('@/App.vue'),
  children: [
    {
      path: '/',
      name: 'home',
      component: () => import('@/views/home.vue'),
    },
    {
      path: '/:any(.*)',
      name: 'notFound',
      component: () => import('@/views/errors/404.vue'),
    },
  ],
} as RouteRecordRaw
