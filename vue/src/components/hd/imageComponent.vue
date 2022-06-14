<script setup lang="ts">
import { isMobile } from '@/utils/helper'

const { url } = defineProps<{
  url?: string
}>()

const dialogState = $ref(false)
</script>

<template>
  <teleport to="body">
    <el-dialog title="查看图片" v-model="dialogState" custom-class="dialog">
      <el-image :src="url" fit="cover" :lazy="true"></el-image>
    </el-dialog>
  </teleport>

  <el-image :src="url" fit="cover" :lazy="true" @click="dialogState = true" v-bind="$attrs" class="cursor-pointer" />
</template>

<style lang="scss" scoped>
.dialog {
  @apply w-11/12 md:w-[600px];
}
</style>
