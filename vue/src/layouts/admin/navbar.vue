<script setup lang="ts"></script>

<template>
  <main>
    <section>
      <a href="" class="flex items-center">
        <icon-system theme="outline" strokeLinejoin="bevel" strokeLinecap="butt" class="mr-1" />
        模块管理
      </a>
      <a href="" class="flex items-center text-gray-200 ml-5">
        <icon-database-setting theme="outline" strokeLinejoin="bevel" strokeLinecap="butt" class="mr-1" />
        模块管理
      </a>
      <a href="" class="flex items-center text-gray-200 ml-5">
        <icon-right-user theme="outline" strokeLinejoin="bevel" strokeLinecap="butt" class="mr-1" />
        会员中心
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
  @apply hover:text-white duration-300 text-gray-400;
}
main {
  @apply flex md:justify-between  px-8 py-3 bg-[#333];

  > :first-child {
    @apply text-[#7ed321] items-center md:flex hidden;
  }
  > :nth-child(2) {
    @apply flex justify-center items-center;
  }
}
</style>
