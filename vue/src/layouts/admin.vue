<script setup lang="ts">
import navbarVue from './admin/navbar.vue'
import TopMenu from './admin/topMenu.vue'
import Copyright from './admin/copyright.vue'
</script>

<template>
  <div class="admin grid md:grid-rows-[auto_auto_1fr_auto] md:pb-32">
    <div>
      <navbarVue />
      <TopMenu />
    </div>
    <div class="md:my-5 md:mx-5 mx-3 p-5 bg-gray-50 rounded-lg relative overflow-hidden">
      <router-view #default="{ Component }">
        <component :is="Component" class="left-5 top-5 right-5 bottom-5" />
      </router-view>
    </div>
    <Copyright />
  </div>
</template>

<style lang="scss">
.admin {
  min-height: 100vh;
  background-image: url('/images/admin.jpg');
  background-size: cover;
}
</style>
