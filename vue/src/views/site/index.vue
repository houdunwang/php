<script setup lang="ts">
import { apiSiteIndex, ISite } from '@/apis/site'

const sites = ref<ISite[]>(await apiSiteIndex().then((r) => r.data))
</script>

<template>
  <div class="">
    <div class="mb-3">
      <ElButton type="primary" @click="$router.push({ name: 'site.add' })">添加站点</ElButton>
    </div>
    <SiteItem v-for="site in sites" class="mb-3" :site="site" />
  </div>
</template>

<style lang="scss"></style>
