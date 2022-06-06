<script setup lang="ts">
import { getUserList } from '@/apis/user'
import { userTableColumns } from '@/config/table'
import { Select } from '@element-plus/icons-vue/dist/types'
const emit = defineEmits<{
  (e: 'select', user: UserModel): void
}>()
const dialogTableVisible = ref(false)

const action = (model: any, type: string) => {
  emit('select', model as UserModel)
  dialogTableVisible.value = false
}
</script>

<template>
  <div class="">
    <el-dialog v-model="dialogTableVisible" title="选择用户" width="95%" top="20px">
      <HdTableComponent :api="getUserList" :columns="userTableColumns" :buttons="[{ command: 'select', title: '选择', type: 'primary' }]" @action="action" />
    </el-dialog>
    <el-button type="primary" size="default" @click="dialogTableVisible = !dialogTableVisible">选择用户</el-button>
  </div>
</template>
