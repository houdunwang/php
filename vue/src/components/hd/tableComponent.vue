<script setup lang="ts">
import dayjs from 'dayjs'
import { tableButtonType, tableColumnsType, userTableColumns } from '@/config/table'
const props = withDefaults(
  defineProps<{
    api: (page?: number, params?: Record<keyof any, any>) => Promise<ResponsePageResult<Record<keyof any, any>>>
    buttons?: tableButtonType[]
    buttonWidth?: number
    columns: tableColumnsType[]
    searchShow?: boolean
  }>(),
  { searchShow: true, buttonWidth: 100 },
)

const emit = defineEmits<{
  (e: 'action', model: { [x: string]: any }, type: string): void
}>()
const data = await props.api(1)
const response = ref(data)

const load = async (page: number = 1) => {
  response.value = await props.api(page)
}

const type = ref('name')
const content = ref('')

const search = async () => {
  response.value = await props.api(1, { type: type.value, content: content.value })
}

const btnColumn = ref()
const butnGroupWidth = ref(0)

onMounted(() => {
  nextTick(() => {
    if (props.buttons) {
      let w = [...btnColumn.value.$el.querySelectorAll('button')].reduce((w, el) => {
        return w + parseInt(getComputedStyle(el).width)
      }, 0)
      butnGroupWidth.value = w + 30
    }
  })
})
</script>

<template>
  <div class="">
    <div class="flex items-center bg-white p-2 border rounded-sm mb-2" v-if="props.searchShow">
      <el-select v-model="type" value-key="" placeholder="" clearable filterable class="mr-1">
        <el-option v-for="item in props.columns" :key="item.prop" :label="item.label" :value="item.prop"> </el-option>
      </el-select>

      <el-input v-model="content" placeholder="请输入搜索内容" size="default" class="mr-1" @keyup.enter="search" />
      <el-button type="success" size="default" @click="search">搜索</el-button>
    </div>

    <el-table :data="response.data" border stripe :fit="true">
      <el-table-column
        v-for="col in props.columns"
        :prop="col.prop"
        :key="col.prop"
        :label="col.label"
        :width="col.width"
        :align="col.align"
        #default="{ row }">
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

      <el-table-column
        align="center"
        :width="props.buttonWidth ?? butnGroupWidth"
        #default="{ row }"
        v-if="props.buttons">
        <el-button-group ref="btnColumn">
          <el-button
            :type="item.type || 'default'"
            v-for="(item, key) in props.buttons"
            @click="emit('action', row, item.command)">
            {{ item.title }}
          </el-button>
        </el-button-group>
      </el-table-column>

      <el-table-column :width="props.buttonWidth" #default="{ row }">
        <slot name="button" :user="row" />
      </el-table-column>
    </el-table>

    <el-pagination
      @current-change="load"
      background
      layout="prev, pager, next"
      :total="response.meta.total"
      :page-size="response.meta.per_page"
      class="mt-3"
      :hide-on-single-page="true" />
  </div>
</template>

<style lang="scss">
td {
  white-space: nowrap;
}
.cell {
  display: inline-block;
}
</style>
