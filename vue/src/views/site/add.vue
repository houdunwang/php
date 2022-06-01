<script setup lang="ts">
import { apiSiteAdd } from '@/apis/siteApi'
import router from '@/router'
import Tab from './components/tab.vue'
import fields from './fields'

const model = ref<Record<string, any>>({})

const onSubmit = async () => {
  await apiSiteAdd(model.value)
  router.push({ name: 'site.index' })
}
</script>

<template>
  <Tab />
  <el-card shadow="never" :body-style="{ padding: '20px' }">
    <FormFieldList :fields="fields" :model="model" @submit="onSubmit"> </FormFieldList>
  </el-card>
</template>
