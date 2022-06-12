<script setup lang="ts">
import { addSite } from '@/apis/site'
import router from '@/router'
import { request } from '@/utils/helper'
import { ElMessage } from 'element-plus'
import Tab from './components/tab.vue'
import { siteField } from '@/config/form'

const onSubmit = request(async (model: any) => {
  await addSite(model)
  router.push({ name: 'site.index' })
})
</script>

<template>
  <Tab />
  <el-card shadow="hover">
    <FormFieldList :fields="siteField" @submit="onSubmit" />
  </el-card>
</template>
