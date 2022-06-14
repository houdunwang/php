<script setup lang="ts">
import { syncSiteCache } from '@/apis/cache'
import dayjs from 'dayjs'
const emit = defineEmits<{
  (e: 'del', id: number): Promise<boolean>
}>()
const props = defineProps<{ site: SiteModel }>()
</script>

<template>
  <div class="site">
    <header>
      <section>
        站长: <span>{{ site.master.name }}</span>
      </section>
      <section>
        <icon-config theme="outline" fill="#333" strokeLinejoin="bevel" strokeLinecap="butt" class="mr-1" />
        扩展模块
      </section>
    </header>
    <main>
      <icon-connection-point theme="filled" :strokeWidth="2" />
      <span class="truncate w-60 overflow-hidden"> {{ props.site.title }} </span>
    </main>
    <footer class="">
      <section class="flex font-bold">
        #1 创建时间
        <span class="flex justify-center items-center ml-1">
          <icon-time theme="outline" strokeLinejoin="bevel" strokeLinecap="butt" class="mr-1" />
          {{ dayjs(props.site.created_at).format('YYYY-MM-DD HH:mm') }}
        </span>
      </section>

      <section class="footer-menu">
        <a>
          <icon-home theme="outline" strokeLinejoin="bevel" strokeLinecap="butt" />
          访问首页
        </a>
        <router-link :to="{ name: 'site.module', params: { sid: site.id } }">
          <icon-home theme="outline" strokeLinejoin="bevel" strokeLinecap="butt" />
          设置模块
        </router-link>
        <router-link :to="{ name: 'admin.index', params: { id: site.id } }">
          <icon-avatar theme="outline" strokeLinejoin="bevel" strokeLinecap="butt" />
          管理员设置
        </router-link>
        <router-link :to="{ name: 'role.index', params: { sid: site.id } }">
          <icon-permissions theme="outline" strokeLinejoin="bevel" strokeLinecap="butt" />
          角色管理
        </router-link>
        <a href="javascript:void(0)" @click="syncSiteCache(site.id)">
          <icon-update-rotation theme="outline" strokeLinejoin="bevel" strokeLinecap="butt" />
          更新缓存
        </a>
        <router-link :to="{ name: 'site.config', params: { id: site.id } }">
          <icon-config theme="outline" strokeLinejoin="bevel" strokeLinecap="butt" /> 站点配置
        </router-link>
        <router-link :to="{ name: 'site.edit', params: { id: site.id } }">
          <icon-editor theme="outline" strokeLinejoin="bevel" strokeLinecap="butt" />
          编辑站点
        </router-link>
        <a href="javascript:void(0)">
          <el-popconfirm title="确定删除站点吗?" @confirm="emit('del', site.id)">
            <template #reference>
              <div class="flex items-center justify-center">
                <icon-delete theme="outline" strokeLinejoin="bevel" strokeLinecap="butt" /> 删除
              </div>
            </template>
          </el-popconfirm>
        </a>
      </section>
    </footer>
  </div>
</template>

<style lang="scss" scoped>
.site {
  @apply bg-gray-50 shadow-sm border hover:shadow-lg rounded-md duration-300;
  a:hover {
    @apply text-sky-700;
  }
  header {
    @apply shadow-sm border-b px-5 py-3 flex items-center justify-between text-gray-600 text-sm font-bold;
    :first-child {
      @apply font-bold;
    }
    :nth-child(2) {
      @apply flex items-center;
    }
  }
  main {
    @apply flex  items-center px-5 py-8 text-gray-600;
    :first-of-type {
      @apply mr-1 text-4xl text-gray-600;
    }
    span {
      @apply text-2xl font-light;
    }
  }
  footer {
    @apply py-3 px-5 font-bold text-xs opacity-90 flex md:flex-row flex-col md:justify-between md:items-center text-gray-600 border-t;
    :nth-of-type(2) {
      @apply flex flex-wrap;
      a {
        @apply flex justify-center items-center mr-2 cursor-pointer;
        :first-child {
          @apply mr-[2px];
        }
      }
    }
  }
}
</style>
