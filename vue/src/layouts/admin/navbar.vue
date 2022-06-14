<script setup lang="ts">
import { syncLocalModule } from '@/apis/module'
import { isSuperAdmin } from '@/utils/helper'
</script>

<template>
  <main>
    <section>
      <a href="/">
        <icon-home-two theme="outline" strokeLinejoin="bevel" strokeLinecap="butt" />
        网站首页
      </a>
      <router-link :to="{ name: 'module.index' }" v-if="isSuperAdmin()">
        <icon-system theme="outline" strokeLinejoin="bevel" strokeLinecap="butt" />
        模块管理
      </router-link>
      <a href="">
        <icon-right-user theme="outline" strokeLinejoin="bevel" strokeLinecap="butt" />
        会员中心
      </a>

      <a href="javascript:void(0)" @click="syncLocalModule">
        <icon-right-user theme="outline" strokeLinejoin="bevel" strokeLinecap="butt" />
        同步本地模块
      </a>
    </section>

    <section>
      <HdNotification class="mr-5 text-[#7ed321] hidden md:block" />
      <HdFullscreen class="text-[#7ed321] hidden md:flex" />
      <UserDrop class="text-gray-200" />
    </section>
  </main>
</template>

<style lang="scss" scoped>
a {
  @apply hover:text-white duration-300 text-gray-400 mr-5 flex items-center;
  span {
    @apply mr-1;
  }
}
main {
  @apply flex md:justify-between  px-8 py-3 bg-[#333];

  > section:first-child {
    @apply text-[#7ed321] items-center md:flex hidden;
  }
  > :nth-child(2) {
    @apply flex justify-center items-center;
  }
}
</style>
