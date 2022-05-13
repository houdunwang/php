<script setup lang="ts">
import useSite from '@/composables/useSite'
import Tab from './tab.vue'
const router = useRouter()
const route = useRoute()

const { site, field, store, load } = useSite()

if (route.params.id) load(route.params.id as unknown as number)

const onSubmit = async () => {
  await store()
  router.push({ name: 'site.index' })
}
</script>

<template>
  <div>
    <Tab />
    <el-card shadow="never">
      <el-form :model="site" label-width="80px" :inline="false" size="large">
        <el-form-item :label="name" v-for="(name, key) of field">
          <el-input v-model="site[key]" />
          <FormError :name="key" />
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="onSubmit"> 保存提交</el-button>
        </el-form-item>
      </el-form>
    </el-card>
  </div>
</template>
