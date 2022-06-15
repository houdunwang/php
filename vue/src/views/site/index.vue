<script setup lang="ts">
// import { syncLocalModule } from '@/apis/module'
import { getSiteList } from '@/apis/site'
import useRequest from '@/composables/useRequest'
const { collection, load, remove } = useRequest<SiteModel>()

const del = async (id: number) => {
  await remove(id)
  await load(getSiteList)
}
await load(getSiteList)
</script>

<template>
  <div class="">
    <div class="mb-3 flex justify-between">
      <el-button-group>
        <ElButton type="primary" @click="$router.push({ name: 'site.add' })">添加站点</ElButton>
        <!-- <ElButton type="success" @click="syncLocalModule">同步模块数据</ElButton> -->
      </el-button-group>
    </div>
    <div class="" v-if="collection?.data.length">
      <SiteItem v-for="site in collection?.data" class="mb-3" :site="site" @del="del" />
    </div>
    <div
      class="flex justify-center items-center py-3 text-gray-600 text-sm font-bold border-gray-200 border rounded-md bg-white"
      v-else>
      <icon-info theme="outline" class="mr-2" />
      暂无站点
    </div>
  </div>
</template>

<style lang="scss"></style>
