<script setup lang="ts">
import dayjs from 'dayjs'
import { tableButtonType, tableColumnsType, userTableColumns } from '@/config/table'
const props = defineProps<{
  api: (page?: number) => Promise<ResponsePageResult<Record<keyof any, any>>>
  buttons?: tableButtonType[]
  columns: tableColumnsType[]
}>()

const emit = defineEmits<{
  (e: 'action', model: { [x: string]: any }, type: string): void
}>()

const response = ref(await props.api(1))

const load = async (page: number = 1) => {
  response.value = await props.api(page)
}
load()
</script>

<template>
  <div class="">
    <el-table :data="response.data" border stripe>
      <el-table-column v-for="col in props.columns" :prop="col.prop" :key="col.prop" :label="col.label" :width="col.width" :align="col.align" #default="{ row }">
        <template v-if="col.type === 'image'">
          <img :src="row[col.prop]" class="rounded-md w-12 self-center block m-auto" />
        </template>
        <template v-else-if="col.type === 'radio'">
          <span v-for="c in col.options" v-show="c[1] == row[col.prop]">
            <el-tag>{{ c[0] }}</el-tag>
          </span>
        </template>
        <template v-else-if="col.type === 'date'">
          {{ dayjs(row[col.prop]).format('YYYY-mm-DD') }}
        </template>
        <template v-else>
          {{ row[col.prop] }}
        </template>
      </el-table-column>

      <el-table-column :width="props.buttons.length == 1 ? 100 : props.buttons.length * 70" align="center" #default="{ row }" v-if="props.buttons">
        <el-button-group>
          <el-button :type="item.type || 'default'" v-for="(item, key) in props.buttons" @click="emit('action', row, item.command)">
            {{ item.title }}
          </el-button>
        </el-button-group>
      </el-table-column>
    </el-table>

    <el-pagination @current-change="load" background layout="prev, pager, next" :total="response.meta.total" :page-size="response.meta.per_page" class="mt-3" :hide-on-single-page="true" />
  </div>
</template>
