export type tableColumnsType = {
  prop: string
  label: string
  width?: number
  align?: 'left' | 'center' | 'right'
  type?: 'image' | 'date' | 'input'
}

export type tableButtonType = { title: string; command: string; type?: 'primary' | 'success' | 'info' | 'warning' | 'danger' }

export const userTableColumns = [
  { prop: 'id', label: 'ID', width: 60, align: 'center' },
  { prop: 'name', label: '用户名' },
  { prop: 'avatar', label: '头像', type: 'image', width: 100, align: 'center' },
  { prop: 'email', label: '邮箱' },
  { prop: 'sex', label: '性别', align: 'center' },
  { prop: 'mobile', label: '手机号' },
  { prop: 'created_at', label: '创建时间', type: 'date', width: 150 },
  { prop: 'updated_at', label: '更新时间', type: 'date', width: 150 },
] as tableColumnsType[]
