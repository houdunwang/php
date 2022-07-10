import { RouteRecordRaw } from 'vue-router'
export default {
  name: 'base',
  path: '/',
  component: () => import('@/App.vue'),
  children: [
    {
      path: '',
      name: 'home',
      component: () => import('@/views/home.vue'),
    },
  ],
} as RouteRecordRaw
