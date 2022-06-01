<script setup lang="ts">
import { Ref } from 'vue'

const props = defineProps<{
  model: any
  fields: FieldListComponentFieldsProp[]
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
        <el-input v-model="model![f.name]" :placeholder="f.placeholder" />
        <FormError :name="f.error_name || f.name" />
      </template>
      <template v-if="f.type == 'image'">
        <div class="flex flex-col">
          <UploadSingleImage v-model="model[f.name]" />
          <FormError :name="f.error_name || f.name" />
        </div>
      </template>
    </el-form-item>
    <el-form-item>
      <slot name="button">
        <el-button type="primary" @click="emit('submit')"> 保存提交</el-button>
      </slot>
    </el-form-item>
  </el-form>
</template>
