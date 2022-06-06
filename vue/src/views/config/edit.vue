<script setup lang="ts">
import { getConfig, updateConfig } from '@/apis/config'
import { configModelField } from '@/config/form'
import router from '@/router'
import systemStore from '@/store/systemStore'
import { ElMessage } from 'element-plus'

const model = ref(await getConfig().then((r) => r.data))
const store = systemStore()
const onSubmit = async () => {
  await updateConfig(model.value)
  ElMessage.success('保存成功')
  store.load()
  document.title = model.value.site.title
  router.push({ name: 'system.index' })
}
const tabModel = ref('site')
</script>

<template>
  <div class="">
    <el-tabs v-model="tabModel" tab-position="top" type="border-card">
      <el-tab-pane label="网站信息" name="site">
        <FormFieldList :model="model.site" :fields="configModelField.site" @submit="onSubmit">
          <template #button> <span></span> </template>
        </FormFieldList>
      </el-tab-pane>

      <el-tab-pane label="验证码" name="code">
        <FormFieldList :model="model.code" :fields="configModelField.code">
          <template #button> <span></span> </template>
        </FormFieldList>
      </el-tab-pane>
      <el-tab-pane label="阿里云" name="aliyun">
        <FormFieldList :model="model.aliyun" :fields="configModelField.aliyun">
          <template #button> <span></span> </template>
        </FormFieldList>
      </el-tab-pane>
      <el-tab-pane label="用户头像" name="avatar">
        <FormFieldList :model="model.avatar" :fields="configModelField.avatar">
          <template #button> <span></span> </template>
        </FormFieldList>
      </el-tab-pane>
      <el-tab-pane label="文件上传" name="upload">
        <FormFieldList :model="model.upload" :fields="configModelField.upload">
          <template #button> <span></span> </template>
        </FormFieldList>
      </el-tab-pane>
    </el-tabs>

    <el-button type="primary" size="large" @click="onSubmit" class="!mt-3 block">保存提交</el-button>
  </div>
</template>
