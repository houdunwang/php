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
}
</script>

<template>
  <div class="">
    <HdTab
      :tabs="[
        { label: '站点列表', route: { name: 'site.index' } },
        { label: '系统配置', current: true, route: { name: 'config.edit' } },
      ]" />
    <FormFieldList
      :model="model.site"
      :fields="[
        { title: '标题', name: 'title', type: 'input', error_name: 'site.title' },
        { title: '标志', name: 'logo', type: 'image', error_name: 'site.logo' },
      ]"
      @submit="onSubmit">
    </FormFieldList>
  </div>
</template>
