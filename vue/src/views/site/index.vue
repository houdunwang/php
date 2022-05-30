<script setup lang="ts">
import { apiSiteGet, ISite } from '@/apis/siteApi'
import useRequest from '@/composables/useRequest'

const { collection, load, remove } = useRequest<ISite>()

const del = async (id: number) => {
  await remove(id)
  await load(apiSiteGet)
}
await load(apiSiteGet)
</script>

<template>
  <div class="">
    <div class="mb-3">
      <ElButton type="primary" @click="$router.push({ name: 'site.add' })">添加站点</ElButton>
    </div>
    <div class="" v-if="collection?.data.length">
      <SiteItem v-for="site in collection?.data" class="mb-3" :site="site" @del="del" />
    </div>
    <div class="flex justify-center items-center py-3 text-gray-600 text-base" v-else>
      <icon-info theme="outline" class="mr-2" />
      暂无站点
    </div>
  </div>
</template>

<style lang="scss"></style>
