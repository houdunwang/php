<script setup lang="ts">
import { getUserList } from '@/apis/user'
import { tableButtonType, userTableColumns } from '@/config/table'

const buttons = [
  { title: '查看', command: 'show', type: 'success' },
  { title: '查看', command: 'show', type: 'danger' },
] as tableButtonType[]

const router = useRouter()

const action = (model: any, type: string) => {
  const user = model as UserModel
  switch (type) {
    case 'show':
      router.push({ name: 'user.show', params: { id: user.id } })
      break
  }
}
</script>

<template>
  <hd-tab
    :tabs="[
      { label: '系统管理', route: { name: 'system.index' } },
      { label: '用户列表', route: { name: 'user.index' }, current: true },
    ]" />
  <hd-table-component :api="getUserList" :columns="userTableColumns" :buttons="buttons" @action="action" />
</template>
