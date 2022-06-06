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

export const configModelField = {
  site: [
    { title: '标题', name: 'title', type: 'input', error_name: 'site.title' },
    { title: '标志', name: 'logo', type: 'image', error_name: 'site.logo' },
    { title: '版权信息', name: 'copyright', error_name: 'site.copyright' },
  ],
  code: [
    { title: '过期时间', name: 'expire', error_name: 'code.expire', placeholder: '单位为秒' },
    { title: '数量', name: 'length', error_name: 'code.length' },
    { title: '间隔时间', name: 'timeout', error_name: 'code.timeout', placeholder: '每次发送间隔时间' },
  ],
  aliyun: [
    { title: 'key', name: 'access_key_id', error_name: 'aliyun.access_key_id' },
    { title: 'secret', name: 'access_key_secret', error_name: 'aliyun.access_key_secret' },
    { title: '短信签名', name: 'sms_sign_name', error_name: 'aliyun.sms_sign_name' },
  ],
  avatar: [
    { title: '头像宽度', name: 'width', error_name: 'avatar.width' },
    { title: '头像高度', name: 'height', error_name: 'avatar.height' },
  ],
  upload: [
    { title: '文件大小', name: 'size', error_name: 'upload.size' },
    { title: '文件类型', name: 'mimes', error_name: 'upload.mimes' },
  ],
}
