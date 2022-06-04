export type formFieldType = {
  title: string
  name: string
  error_name?: string
  type?: 'input' | 'textarea' | 'image' | 'preview' | 'radio'
  options?: Record<keyof any, any>
  readonly?: boolean
  disabled?: boolean
  placeholder?: string
}

export const userModelField = [
  { title: '昵称', name: 'name', disabled: true },
  { title: '邮箱', name: 'email', disabled: true },
  {
    title: '性别',
    name: 'sex',
    type: 'radio',
    disabled: true,
    options: [
      ['男', 1],
      ['女', 2],
    ],
  },
  { title: '手机号', name: 'mobile', disabled: true },
  { title: '真实姓名', name: 'real_name', disabled: true },
  { title: '头像', name: 'avatar', type: 'preview', disabled: true },
  { title: '主页', name: 'home', disabled: true },
  { title: '创建时间', name: 'created_at', disabled: true },
  { title: '更新时间', name: 'updated_at', disabled: true },
]
