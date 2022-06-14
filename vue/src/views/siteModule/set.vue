<script setup lang="ts">
import { siteFind } from '@/apis/site'
import { addSiteModule, getSiteModuleList, removeSiteModule } from '@/apis/siteModule'
import { moduleTableColumns } from '@/config/table'
import { ElMessageBox } from 'element-plus'
const { sid } = defineProps<{ sid: any }>()

const [site] = await Promise.all([siteFind(sid)])
let tableKey = $ref(0)
const addModule = async (module: any) => {
  await addSiteModule(sid, module.id)
  tableKey++
}

const del = async (module: any) => {
  try {
    await ElMessageBox.confirm('确定删除吗？删除模块将删除模块的所有数据，请谨慎操作！')
    await removeSiteModule(sid, module.id)
    tableKey++
  } catch (error) {}
}
</script>

<template>
  <HdTab
    :tabs="[
      { label: '站点列表', route: { name: 'site.index' } },
      { label: `【${site.title}】站点模块设置`, route: { name: `site.module` } },
    ]" />
  <ModuleSelectModule @select="addModule" class="mb-2" />
  <HdTableComponent :columns="moduleTableColumns" :api="getSiteModuleList" :key="tableKey" :button-width="120">
    <template #button="{ model }">
      <el-button type="danger" size="default" @click="del(model)">移除模块</el-button>
    </template>
  </HdTableComponent>
</template>

<style lang="scss"></style>
