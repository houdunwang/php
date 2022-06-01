<script setup lang="ts">
import { getConfig, updateConfig } from '@/apis/configApi'
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
    <!-- <HdTab
      :tabs="[
        { label: '站点列表', route: { name: 'site.index' } },
        { label: '系统配置', current: true, route: { name: 'config.edit' } },
      ]" /> -->

    <el-tabs v-model="tabModel" tab-position="top" type="border-card">
      <el-tab-pane label="网站信息" name="site">
        <FormFieldList
          :model="model.site"
          :fields="[
            { title: '标题', name: 'title', type: 'input', error_name: 'site.title' },
            { title: '标志', name: 'logo', type: 'image', error_name: 'site.logo' },
            { title: '版权信息', name: 'copyright', error_name: 'site.copyright' },
          ]"
          @submit="onSubmit">
          <template #button> <span></span> </template>
        </FormFieldList>
      </el-tab-pane>

      <el-tab-pane label="验证码" name="code">
        <el-alert type="success" effect="light" closable class="!mb-3">短信或邮箱验证码</el-alert>

        <FormFieldList
          :model="model.code"
          :fields="[
            { title: '过期时间', name: 'expire', error_name: 'code.expire', placeholder: '单位为秒' },
            { title: '数量', name: 'length', error_name: 'code.length' },
            { title: '间隔时间', name: 'timeout', error_name: 'code.timeout', placeholder: '每次发送间隔时间' },
          ]">
          <template #button> <span></span> </template>
        </FormFieldList>
      </el-tab-pane>
      <el-tab-pane label="阿里云" name="aliyun">
        <FormFieldList
          :model="model.aliyun"
          :fields="[
            { title: 'key', name: 'access_key_id', error_name: 'aliyun.access_key_id' },
            { title: 'secret', name: 'access_key_secret', error_name: 'aliyun.access_key_secret' },
            { title: '短信签名', name: 'sms_sign_name', error_name: 'aliyun.sms_sign_name' },
          ]">
          <template #button> <span></span> </template>
        </FormFieldList>
      </el-tab-pane>
      <el-tab-pane label="用户头像" name="avatar">
        <FormFieldList
          :model="model.avatar"
          :fields="[
            { title: '头像宽度', name: 'width', error_name: 'avatar.width' },
            { title: '头像高度', name: 'height', error_name: 'avatar.height' },
          ]">
          <template #button> <span></span> </template>
        </FormFieldList>
      </el-tab-pane>
      <el-tab-pane label="文件上传" name="upload">
        <FormFieldList
          :model="model.upload"
          :fields="[
            { title: '文件大小', name: 'size', error_name: 'upload.size' },
            { title: '文件类型', name: 'mimes', error_name: 'upload.mimes' },
          ]">
          <template #button> <span></span> </template>
        </FormFieldList>
      </el-tab-pane>
    </el-tabs>

    <el-button type="primary" size="large" @click="onSubmit" class="!mt-3 block">保存提交</el-button>
  </div>
</template>
