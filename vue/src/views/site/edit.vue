<script setup lang="ts">
import { apiSiteUpdate } from '@/apis/apiSite'
import Tab from './components/tab.vue'
import fields from './fields'
</script>

<template>
  <Tab />
  <FormPost :fields="fields" :edit-api="apiSiteUpdate" />
</template>

<style lang="scss"></style>
