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
  ElMessage.success('添加成功')
})
</script>

<template>
  <Tab />
  <FormFieldList :fields="siteField" @submit="onSubmit" />
</template>
