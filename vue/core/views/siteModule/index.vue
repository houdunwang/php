<script setup lang="ts">
import { isSuperAdmin, access } from '@@/utils/helper'
const { sid } = defineProps<{ sid: any }>()

const { loadModuleList, addModule, redirectModuleAdmin, setDefaultModule, delModule, modules } = useSiteModule()
const { getSiteByParams, site } = useSite()
await getSiteByParams()
await loadModuleList(sid)

const defaultModule = async (module: ModuleModel) => {
  await setDefaultModule(sid, module)
  getSiteByParams()
}
</script>

<template>
  <CoreHdTab
    :tabs="[
      { label: '站点列表', route: { name: 'site.index' } },
      { label: `【${site}】站点模块设置`, route: { name: `site.module.index` } },
    ]" />
  <CoreModuleSelectModule @select="addModule(sid, $event)" class="mb-2" v-if="isSuperAdmin()" />

  <section>
    <div v-for="module of modules.data" :key="module.id">
      <img :src="module.preview" class="rounded-full h-[60px] object-cover my-3" />
      <h4>{{ module.title }}</h4>
      <div class="py-2 bg-gray-200 border-t mt-3 w-full flex justify-center">
        <el-button-group>
          <el-button type="primary" size="small" @click="redirectModuleAdmin(module)">进入模块</el-button>
          <el-button type="danger" size="small" @click="delModule(site.id, module)" v-if="isSuperAdmin()">
            删除模块
          </el-button>
          <template v-if="access('system-module-set-default', site)">
            <el-button type="success" size="small" @click="defaultModule(module)" v-if="module.id == site.module_id">
              取消默认模块
            </el-button>
            <el-button type="info" size="small" @click="defaultModule(module)" v-else> 设为默认模块 </el-button>
          </template>
        </el-button-group>
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped>
section {
  @apply grid md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-2;
  > div {
    @apply border flex flex-col items-center rounded-md hover:shadow-lg duration-300;
    h4 {
      @apply font-bold text-sm text-gray-600;
    }
  }
}
</style>
