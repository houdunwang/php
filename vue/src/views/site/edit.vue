<script setup lang="ts">
import { getSite, updateSite } from '@/apis/site'
import { siteField, siteConfigField } from '@/config/form'
import router from '@/router'
import { request } from '@/utils/helper'
import { ElMessage } from 'element-plus'
import Tab from './components/tab.vue'
const route = useRoute()
const model = ref(await getSite(route.params?.id))

console.log(model.value)

const onSubmit = request(async () => {
  await updateSite(model.value)
  router.push({ name: 'site.index' })
  ElMessage.success('更新成功')
})
const tabModel = ref('base')
</script>

<template>
  <Tab />
  <el-tabs v-model="tabModel" tab-position="top" type="border-card">
    <el-tab-pane label="基本信息" name="base">
      <FormFieldList :model="model" :fields="siteField" @submit="onSubmit" />
    </el-tab-pane>
    <el-tab-pane label="网站资料" name="site">
      <FormFieldList :model="model.config.site" :fields="siteConfigField.site" @submit="onSubmit" />
    </el-tab-pane>
    <el-tab-pane label="阿里云" name="aliyun">
      <FormFieldList :model="model.config.aliyun" :fields="siteConfigField.aliyun" @submit="onSubmit" />
    </el-tab-pane>
  </el-tabs>
</template>

<style lang="scss"></style>
