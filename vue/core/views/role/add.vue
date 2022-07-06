<script setup lang="ts">
import { roleForm } from '@@/config/form'
import TabVue from './tab.vue'

const { site, getBySid } = useSite()
const { add } = useRole()
await getBySid()
</script>

<template>
  <TabVue :site="site" />
  <CoreFormFieldList :fields="roleForm" @submit="add" />
</template>
