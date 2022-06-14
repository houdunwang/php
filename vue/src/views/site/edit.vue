<script setup lang="ts">
import { siteFind, updateSite } from '@/apis/site'
import { siteForm, siteConfigForm } from '@/config/form'
import router from '@/router'
import { request } from '@/utils/helper'
import { ElMessage } from 'element-plus'
import Tab from './components/tab.vue'
const route = useRoute()
const model = ref(await siteFind(route.params?.id))

const onSubmit = request(async () => {
  await updateSite(model.value)
  router.push({ name: 'site.index' })
})
</script>

<template>
  <Tab />
  <FormFieldList :model="model" :fields="siteForm" @submit="onSubmit" />
</template>

<style lang="scss"></style>
