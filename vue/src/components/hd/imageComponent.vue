<script setup lang="ts">
const { url } = defineProps<{
  url?: string
}>()

const dialogState = $ref(false)
</script>

<template>
  <teleport to="body">
    <div>
      <el-dialog title="查看图片" v-model="dialogState" custom-class="dialog">
        <el-image :src="url" fit="cover" :lazy="true"></el-image>
      </el-dialog>
    </div>
  </teleport>
  <el-image :src="url" fit="cover" :lazy="true" @click="dialogState = true" v-bind="$attrs" class="cursor-pointer" />
</template>

<style lang="scss" scoped>
:deep(.dialog) {
  @apply w-11/12 md:max-w-[680px];
}
</style>
