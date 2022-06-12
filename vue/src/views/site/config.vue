<script setup lang="ts">
import { getSite, updateSite } from '@/apis/site'
import { siteConfigForm } from '@/config/form'
import router from '@/router'
import { request } from '@/utils/helper'
const route = useRoute()
const model = $ref(await getSite(route.params?.id))

const onSubmit = request(async () => {
  await updateSite(model)
  router.push({ name: 'site.index' })
})
const tabModel = ref('site')
</script>

<template>
  <HdTab
    :tabs="[
      { label: '站点列表', route: { name: 'admin' } },
      { label: `站点【${model.title}】配置`, route: { name: 'site.config' } },
    ]" />
  <el-tabs v-model="tabModel" tab-position="top" type="border-card">
    <el-tab-pane label="网站资料" name="site">
      <FormFieldList :model="model.config.site" :fields="siteConfigForm.site" @submit="onSubmit" />
    </el-tab-pane>
    <el-tab-pane label="阿里云" name="aliyun">
      <FormFieldList :model="model.config.aliyun" :fields="siteConfigForm.aliyun" @submit="onSubmit" />
    </el-tab-pane>
  </el-tabs>
</template>

<style lang="scss"></style>
