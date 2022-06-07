<script setup lang="ts">
import { getUser } from '@/apis/user'
import { userField } from '@/config/form'

const route = useRoute()
const { data } = await getUser(route.params.id)
const user = ref(data)
</script>

<template>
  <hd-tab
    :tabs="[
      { label: '系统管理', route: { name: 'system.index' } },
      { label: '用户列表', route: { name: 'user.index' } },
      { label: `${user.name}`, route: { name: 'user.show', params: { id: user.id } }, current: true },
    ]" />

  <form-field-list :model="user" :fields="userField">
    <template #button>
      <span class=""></span>
    </template>
    >
  </form-field-list>

  <el-button type="primary" size="default" @click="$router.push({ name: 'user.index' })">返回用户列表</el-button>
</template>
