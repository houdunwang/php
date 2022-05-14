<script setup lang="ts">
import navbarVue from './admin/navbar.vue'
import TopMenu from './admin/topMenu.vue'
</script>

<template>
  <div class="admin grid md:grid-rows-[auto_auto_1fr] md:pb-32">
    <div>
      <navbarVue />
      <TopMenu />
    </div>
    <div class="md:my-5 md:mx-5 mx-3 p-5 bg-gray-50 rounded-lg">
      <router-view #default="{ Component, route }">
        <component :is="Component" />
      </router-view>
    </div>
    <div class=""></div>
  </div>
</template>

<style lang="scss">
.admin {
  min-height: 100vh;
  background-image: url('/images/admin.jpg');
  background-size: cover;
}
</style>
