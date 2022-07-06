<script setup lang="ts">
import { siteForm } from '@@/config/form'
import Tab from './components/tab.vue'

const { update, site, getBySid } = useSite()
await getBySid()
</script>

<template>
  <Tab />
  <CoreFormFieldList :model="site" :fields="siteForm.base" @submit="update" />
</template>
