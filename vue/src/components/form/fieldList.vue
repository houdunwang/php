<script setup lang="ts">
import { Ref } from 'vue'

const props = defineProps<{
  model: any
  fields: { title: string; name: string; type?: 'input' | 'textarea' | 'image' }[]
}>()

const emit = defineEmits<{
  (e: 'submit'): void
}>()

const model = props.model
</script>

<template>
  <el-form :model="model" label-width="80px" :inline="false" size="large">
    <el-form-item :label="f.title" v-for="f of props.fields">
      <template v-if="f.type == 'input' || !f.type">
        <el-input v-model="model![f.name]" />
        <FormError :name="f.name" />
      </template>
      <template v-if="f.type == 'image'">
        <UploadSingleImage v-model="model[f.name]" />
        <!-- <el-input v-model="model![f.name]" /> -->
        <FormError :name="f.name" />
      </template>
    </el-form-item>
    <!-- <slot>
      <el-form-item>
        <el-button type="primary" @click="emit('submit')"> 保存提交</el-button>
      </el-form-item>
    </slot> -->
  </el-form>
</template>
