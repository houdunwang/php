<script setup lang="ts">
import { apiSiteAdd } from '@/apis/apiSite'
import Tab from './components/tab.vue'
import fields from './fields'
</script>

<template>
  <Tab />
  <FormPost :add-api="apiSiteAdd" :fields="fields" />
</template>

<style lang="scss"></style>
