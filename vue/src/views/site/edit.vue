<script setup lang="ts">
import { getSite, updateSite } from '@/apis/site'
import { siteField, siteConfigField } from '@/config/form'
import router from '@/router'
import { request } from '@/utils/helper'
import { ElMessage } from 'element-plus'
import Tab from './components/tab.vue'
const route = useRoute()
const model = ref(await getSite(route.params?.id))

const onSubmit = request(async () => {
  await updateSite(model.value)
  router.push({ name: 'site.index' })
})
</script>

<template>
  <Tab />
  <el-card shadow="hover">
    <FormFieldList :model="model" :fields="siteField" @submit="onSubmit" />
  </el-card>
</template>

<style lang="scss"></style>
