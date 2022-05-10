<script setup lang="ts"></script>

<template>
  <div class="bg-gray-50 p-5 rounded-sm shadow-md">
    <div class="mb-3">
      <ElButton class="block" type="primary">添加站点</ElButton>
    </div>
    <SystemSite v-for="i in 5" class="mb-3" />
  </div>
</template>

<style lang="scss"></style>
