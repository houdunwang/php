<script setup lang="ts">
import { formFieldType } from '@/config/form'

const {
  model,
  fields,
  showButton = true,
} = defineProps<{
  model: any
  fields: formFieldType[]
  showButton?: boolean
}>()

const emit = defineEmits<{
  (e: 'submit'): void
}>()
</script>

<template>
  <el-form :model="model" label-width="80px" :inline="false" size="large">
    <el-form-item :label="f.title" v-for="f of fields">
      <template v-if="f.type == 'input' || !f.type">
        <el-input v-model="model![f.name]" :placeholder="f.placeholder" :readonly="f.readonly" :disabled="f.disabled" />
        <FormError :name="f.error_name || f.name" />
      </template>
      <template v-if="f.type == 'image'">
        <div class="flex flex-col">
          <UploadSingleImage v-model="model[f.name]" />
          <FormError :name="f.error_name || f.name" />
        </div>
      </template>
      <template v-if="f.type == 'radio'">
        <el-radio-group v-model="model[f.name]" class="ml-4" :disabled="f.disabled">
          <el-radio :label="val[1]" size="large" v-for="val in f.options"> {{ val[0] }} </el-radio>
        </el-radio-group>
      </template>
      <template v-if="f.type == 'preview'">
        <div class="flex flex-col">
          <el-avatar shape="square" :size="100" fit="cover" :src="model[f.name]" />
        </div>
      </template>
    </el-form-item>
    <el-form-item v-if="showButton">
      <slot name="button">
        <el-button type="primary" @click="emit('submit')">保存提交</el-button>
      </slot>
    </el-form-item>
  </el-form>
</template>
