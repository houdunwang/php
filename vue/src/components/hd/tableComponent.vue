<script setup lang="ts">
import dayjs from 'dayjs'
import { tableButtonType, userTableColumns } from '@/config/table'
const props = defineProps<{
  modelValue: Record<string, any>[]
  buttons: tableButtonType[]
  columns: Record<string, any>[]
}>()

const emit = defineEmits<{
  (e: 'action', model: { [x: string]: any }, type: string): void
}>()
</script>

<template>
  <el-table :data="props.modelValue" border stripe>
    <el-table-column v-for="col in props.columns" :prop="col.prop" :key="col.prop" :label="col.label" :width="col.width" :align="col.align" #default="{ row }">
      <template v-if="col.type === 'image'">
        <img :src="row[col.prop]" class="rounded-md w-12 self-center block m-auto" />
      </template>
      <template v-else-if="col.type === 'date'">
        {{ dayjs(row[col.prop]).format('YYYY-mm-DD') }}
      </template>
      <template v-else>
        {{ row[col.prop] }}
      </template>
    </el-table-column>

    <el-table-column :width="props.buttons.length * 70" align="center" #default="{ row }" v-if="props.buttons">
      <el-button-group>
        <el-button :type="item.type || 'default'" v-for="(item, key) in props.buttons" @click="emit('action', row, item.command)">
          {{ item.title }}
        </el-button>
      </el-button-group>
    </el-table-column>
  </el-table>
</template>
