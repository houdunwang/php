<script setup lang="ts">
import { formType } from '@/config/form'
import _ from 'lodash'
const {
  fields,
  model: PropsModel,
  showButton = true,
} = defineProps<{
  fields: formType[]
  model?: any
  showButton?: boolean
}>()

const model = $ref(
  PropsModel ||
    _.zipObject(
      fields.map((f) => f.name),
      fields.map((f) => f.value ?? ''),
    ),
)

const emit = defineEmits<{
  (e: 'submit', model: any): void
}>()
</script>

<template>
  <el-card shadow="hover" :body-style="{ padding: '20px' }">
    <el-form :model="model" label-width="80px" :inline="false" size="large">
      <el-form-item :label="f.title" v-for="f of fields">
        <template v-if="f.type == 'image'">
          <div class="flex flex-col">
            <UploadSingleImage v-model="model[f.name]" />
            <FormError :name="f.error_name || f.name" />
          </div>
        </template>
        <template v-else-if="f.type == 'radio'">
          <el-radio-group v-model="model[f.name]" class="ml-4" :disabled="f.disabled">
            <el-radio :label="val[1]" size="large" v-for="val in f.options"> {{ val[0] }} </el-radio>
          </el-radio-group>
        </template>
        <template v-else-if="f.type == 'preview'">
          <div class="flex flex-col">
            <HdImageComponent :url="model[f.name]" class="md:w-28 w-full rounded-md" />
          </div>
        </template>
        <template v-else>
          <el-input
            v-model="model![f.name]"
            :placeholder="f.placeholder"
            :readonly="f.readonly"
            :disabled="f.disabled"
            :value="f.value" />
          <FormError :name="f.error_name || f.name" />
        </template>
      </el-form-item>
      <el-form-item v-if="showButton">
        <slot name="button">
          <el-button type="primary" @click="emit('submit', model)">保存提交</el-button>
        </slot>
      </el-form-item>
    </el-form>
  </el-card>
</template>
