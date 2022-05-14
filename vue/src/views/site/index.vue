<script setup lang="ts">
import { apiSiteGet, ISite } from '@/apis/apiSite'
import useRequest from '@/composables/useRequest'

const { collection, load, remove } = useRequest<ISite>()
await load(apiSiteGet)
</script>

<template>
  <div class="mb-3">
    <ElButton type="primary" @click="$router.push({ name: 'site.add' })">添加站点</ElButton>
  </div>
  <SiteItem v-for="site in collection?.data" class="mb-3" :site="site" @del="remove" />
</template>

<style lang="scss"></style>
