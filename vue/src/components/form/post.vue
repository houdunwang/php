<script setup lang="ts">
import useRequest from '@/composables/useRequest'
import { apiSiteFind } from '@/apis/apiSite'
const router = useRouter()
const route = useRoute()
const props = defineProps<{
  addApi?: (data: any) => Promise<any>
  editApi?: (data: any) => Promise<any>
  fields: { title: string; name: string; form?: string }[]
}>()

const { model, post, find } = useRequest()

if (route.params.id) await find(apiSiteFind, route.params.id as unknown as number)

const onSubmit = async () => {
  await post(model.value.id ? props.editApi! : props.addApi!)
  router.push({ name: 'site.index' })
}
</script>

<template>
  <el-card shadow="never">
    <el-form :model="model" label-width="80px" :inline="false" size="large">
      <el-form-item :label="f.title" v-for="f of props.fields">
        <el-input v-model="model![f.name]" />
        <FormError :name="f.name" />
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="onSubmit"> 保存提交</el-button>
      </el-form-item>
    </el-form>
  </el-card>
</template>
