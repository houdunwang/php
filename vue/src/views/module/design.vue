<script setup lang="ts">
import { addModule } from '@/apis/module'
import { moduleForm } from '@/config/form'
import { ElMessage } from 'element-plus'
const router = useRouter()

const onSubmit = async (module: ModuleModel) => {
  await addModule(module)
  ElMessage.success('模块创建成功')
  router.push({ name: 'module.index' })
}
</script>

<template>
  <HdTab
    :tabs="[
      { label: '系统管理', route: { name: 'system.index' } },
      { label: '模块列表', route: { name: 'module.index' } },
      { label: '模块设计', route: { name: 'module.design' } },
    ]" />
  <el-card shadow="hover" :body-style="{ padding: '20px' }">
    <FormFieldList :fields="moduleForm" @submit="onSubmit" />
  </el-card>
</template>

<style lang="scss"></style>
