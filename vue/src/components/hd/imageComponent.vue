<script setup lang="ts">
const { url, height = 100 } = defineProps<{
  url?: string
  height?: number
}>()

const dialogState = $ref(false)
</script>

<template>
  <teleport to="body">
    <el-dialog title="查看图片" v-model="dialogState" width="35%" top="20px">
      <el-image :src="url" fit="cover" :lazy="true"></el-image>
    </el-dialog>
  </teleport>

  <el-image :src="url" fit="cover" :lazy="true" @click="dialogState = true" v-bind="$attrs" class="cursor-pointer" />
</template>

<style lang="scss"></style>
