<script setup lang="ts">
import { apiSiteAdd, ISite } from '@/apis/site'
import _ from 'lodash'
const config = { title: '标题', url: '链接', email: '邮箱', address: '地址' }

const form = reactive<Record<keyof ISite, any>>(_.zipObject(Object.keys(config)) as any)

const router = useRouter()
const onSubmit = async () => {
  try {
    await apiSiteAdd(form)
    router.push({ name: 'site.index' })
  } catch (error) {}
}
</script>

<template>
  <div class="">
    <HdTab
      :tabs="[
        { label: '站点列表', route: { name: 'admin' } },
        { label: '添加站点', route: { name: 'site.add' } },
      ]" />
    <el-card shadow="never">
      <el-form :model="form" label-width="80px" :inline="false" size="large">
        <el-form-item :label="name" v-for="(name, key) of config">
          <el-input v-model="form[key]" />
          <FormError :name="key" />
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="onSubmit"> 保存提交</el-button>
        </el-form-item>
      </el-form>
    </el-card>
  </div>
</template>
