<script setup lang="ts">
import systemStore from '@/store/systemStore'

const store = systemStore()
</script>

<template>
  <div class="flex justify-center text-white shadow-sm font-bold mt-3 text-sm">
    {{ store.data.config.copyright }}
  </div>
</template>

<style lang="scss"></style>
