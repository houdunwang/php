<script setup lang="ts">
import Step from './step.vue'

const redirect = () => {
  location.href = '/'
}
</script>

<template>
  <main>
    <Step :step="4" class="w-full" />
    <section>
      <div class="">
        <img src="/images/xj8.jpg" class="w-full rounded-full w-32 h-32 object-cover" />
        <h2>恭喜！安装成功</h2>
        <el-button type="success" size="default" @click="redirect" class="mt-5"> 访问首页 </el-button>
      </div>
    </section>
  </main>
</template>

<style lang="scss" scoped>
main {
  @apply bg-gray-800 w-screen h-screen pt-5;
  section {
    @apply w-[800px] flex justify-center flex-col m-auto bg-gray-50 rounded-2xl shadow-2xl;
    h2 {
      @apply text-center text-gray-700 py-5 text-2xl;
    }
    div {
      @apply flex flex-col justify-center items-center py-5;
    }
  }
}
</style>
