<script setup lang="ts">
import { getSite, updateSite } from '@/apis/site'
import { siteField } from '@/config/form'
import router from '@/router'
import { request } from '@/utils/helper'
import { ElMessage } from 'element-plus'
import Tab from './components/tab.vue'

const route = useRoute()
const model = ref(await getSite(route.params?.id))

const onSubmit = request(async () => {
  await updateSite(model.value)
  router.push({ name: 'site.index' })
  ElMessage.success('更新成功')
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

<style lang="scss"></style>
