<script setup lang="ts">
import { addSite } from '@/apis/site'
import router from '@/router'
import { request } from '@/utils/helper'
import { ElMessage } from 'element-plus'
import Tab from './components/tab.vue'
import { siteField } from '@/config/form'

const model = ref<Record<string, any>>({})

const c = Promise.resolve(3)
const onSubmit = request(async () => {
  await addSite(model.value)
  router.push({ name: 'site.index' })
  ElMessage.success('添加成功')
})
const tabModel = ref('site')
</script>

<template>
  <Tab />
  <el-tabs v-model="tabModel" tab-position="top" type="border-card">
    <el-tab-pane label="网站信息" name="site">
      <FormFieldList :model="model" :fields="siteField.site" @submit="onSubmit" />
    </el-tab-pane>
  </el-tabs>
</template>
