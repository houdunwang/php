import * as yup from 'yup'

yup.setLocale({
  mixed: {
    required: '${label}不能为空',
  },
  string: {
    email: '邮箱格式错误',
    min: '${label}不能少于 ${min} 位',
    max: '不能大于 ${max} 位',
  },
  number: {
    min: '${label}}不能少于 ${min} ',
    max: '不能大于 ${max} ',
  },
})
export default yup
