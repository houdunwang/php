<script setup lang="ts">
const props = defineProps({
  error: String,
})

// const error = props.modelValue
</script>

<template>
  <div class="hd-error" v-show="props.error">
    {{ props.error }}
  </div>
</template>

<style lang="scss">
.hd-error {
  @apply rounded-md bg-pink-500 text-white text-xs px-2 py-1 mt-2;
}
</style>
