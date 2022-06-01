<script setup lang="ts">
import { apiSiteFind, apiSiteUpdate } from '@/apis/siteApi'
import router from '@/router'
import Tab from './components/tab.vue'
import fields from './fields'
const route = useRoute()
const model = ref(await apiSiteFind(route.params?.id).then((r) => r.data))

const onSubmit = async () => {
  await apiSiteUpdate(model.value)
  router.push({ name: 'site.index' })
}
</script>

<template>
  <Tab />
  <el-card shadow="never" :body-style="{ padding: '20px' }">
    <FormFieldList :fields="fields" :model="model" @submit="onSubmit" />
  </el-card>
</template>

<style lang="scss"></style>
