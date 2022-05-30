<script setup lang="ts">
import { getConfig, updateConfig } from '@/apis/configApi'

const model = ref(await getConfig().then((r) => r.data))

const onSubmit = async () => {
  await updateConfig(model.value)
}
</script>

<template>
  <div class="">
    <HdTab :tabs="[{ label: '系统配置', current: true, route: { name: 'config.edit' } }]" />

    <el-card shadow="never">
      <template #header> 站点令牌 </template>
      <FormFieldList
        :model="model.site"
        :fields="[
          { title: '标题', name: 'title', type: 'input' },
          { title: '标志', name: 'logo', type: 'image' },
        ]">
      </FormFieldList>
    </el-card>
  </div>
</template>
