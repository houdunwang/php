<script setup lang="ts">
import { TabsPaneContext } from 'element-plus'
const router = useRouter()
const route = useRoute()

interface ITab {
  label: string
  active?: boolean
  event?: () => void
  route?: any
  current?: boolean
}

const props = defineProps<{ tabs: ITab[] }>()

const tabs = computed(() => {
  return props.tabs.filter((tab) => {
    return tab.current ? tab.route?.name == route.name : true
  })
})

const change = (pane: TabsPaneContext, ev: Event) => {
  const tab = props.tabs[pane.index as unknown as number]
  if (tab.event) tab.event()

  if (tab.route) router.push(tab.route)
}

const active = ref('name' + props.tabs.findIndex((tab) => tab.route?.name == route.name))
</script>

<template>
  <el-tabs type="card" v-model="active" @tab-click="change">
    <el-tab-pane :label="tab.label" :name="`name${index}`" v-for="(tab, index) of tabs" />
  </el-tabs>
</template>
