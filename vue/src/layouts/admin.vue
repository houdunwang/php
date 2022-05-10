<script setup lang="ts">
import navbarVue from './admin/navbar.vue'
import TopMenu from './admin/topMenu.vue'
</script>

<template>
  <div class="admin h-auto grid md:grid-rows-[auto_1fr] bg-opacity-20 md:pb-32">
    <navbarVue />
    <TopMenu />
    <div class="relative md:my-5 md:mx-5 mx-3 mb-32">
      <router-view #default="{ Component, route }">
        <Transition
          appear
          class="animate__animated"
          :enter-active-class="route.meta.enterClass ?? 'animate__fadeInRight'"
          :leave-active-class="route.meta.leaveClass ?? 'animate__fadeOutLeft'">
          <component :is="Component" class="right-0 left-0" />
        </Transition>
      </router-view>
    </div>
  </div>
</template>

<style lang="scss">
.admin {
  background-image: url('/images/admin.jpg');
  background-size: cover;
}
</style>
