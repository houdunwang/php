<script setup lang="ts">
import useSite from '@/composables/useSite'

const { sites, load, delSite } = useSite()
load()
</script>

<template>
  <div class="">
    <div class="mb-3">
      <ElButton type="primary" @click="$router.push({ name: 'site.add' })">添加站点</ElButton>
    </div>
    <SiteItem v-for="site in sites" class="mb-3" :site="site" @del="delSite" />
  </div>
</template>

<style lang="scss"></style>
