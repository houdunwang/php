<script setup lang="ts">
import { getSite, updateSite } from '@/apis/site'
import router from '@/router'
import { request } from '@/utils/helper'
import Tab from './components/tab.vue'
import fields from './fields'
const route = useRoute()
const model = ref(await getSite(route.params?.id))

const onSubmit = request(async () => {
  await updateSite(model.value)
  router.push({ name: 'site.index' })
})
</script>

<template>
  <Tab />
  <el-card shadow="never" :body-style="{ padding: '20px' }">
    <FormFieldList :fields="fields" :model="model" @submit="onSubmit" />
  </el-card>
</template>

<style lang="scss"></style>
