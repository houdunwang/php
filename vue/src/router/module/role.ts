import { RouteRecordRaw } from 'vue-router'
export default {
  name: 'role',
  path: '/role',
  component: () => import('@/layouts/admin.vue'),
  meta: { auth: true },
  children: [
    {
      name: 'role.index',
      path: ':sid',
      component: () => import('@/views/role/index.vue'),
      props: true,
    },
    {
      name: 'role.add',
      path: 'role/add/:sid',
      component: () => import('@/views/role/add.vue'),
      props: true,
    },
    {
      name: 'role.edit',
      path: 'role/:sid/:rid',
      component: () => import('@/views/role/edit.vue'),
      props: true,
    },
  ],
} as RouteRecordRaw
