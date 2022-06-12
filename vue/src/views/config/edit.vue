<script setup lang="ts">
import { getSystem, updateSystem } from '@/apis/system'
import { configField } from '@/config/form'
import router from '@/router'
import systemStore from '@/store/systemStore'

const model = ref(await getSystem())

const store = systemStore()
const onSubmit = async () => {
  await updateSystem(model.value)
  await store.load()
  document.title = store.config.site.title
  router.push({ name: 'system.index' })
}
const tabModel = ref('site')
</script>

<template>
  <HdTab
    :tabs="[
      { label: '系统管理', route: { name: 'system.index' } },
      { label: '系统配置', route: { name: 'config.edit' } },
    ]" />
  <el-tabs v-model="tabModel" tab-position="top" type="border-card">
    <el-tab-pane label="网站信息" name="site">
      <FormFieldList :model="model.config.site" :fields="configField.site" @submit="onSubmit" />
    </el-tab-pane>
    <el-tab-pane label="验证码" name="code">
      <FormFieldList :model="model.config.code" :fields="configField.code" @submit="onSubmit" />
    </el-tab-pane>
    <el-tab-pane label="阿里云" name="aliyun">
      <FormFieldList :model="model.config.aliyun" :fields="configField.aliyun" @submit="onSubmit" />
    </el-tab-pane>
    <el-tab-pane label="用户头像" name="avatar">
      <FormFieldList :model="model.config.avatar" :fields="configField.avatar" @submit="onSubmit" />
    </el-tab-pane>
    <el-tab-pane label="文件上传" name="upload">
      <FormFieldList :model="model.config.upload" :fields="configField.upload" @submit="onSubmit" />
    </el-tab-pane>
  </el-tabs>
</template>
