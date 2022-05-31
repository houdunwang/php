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
  <FormFieldList :fields="fields" :model="model" @submit="onSubmit"> </FormFieldList>
</template>
