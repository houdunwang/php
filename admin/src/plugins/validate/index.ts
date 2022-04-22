import yup from './yup'

import rules from '@vee-validate/rules'
import * as veeValidate from 'vee-validate'
import { localize } from '@vee-validate/i18n'
import zh_CN from '@vee-validate/i18n/dist/locale/zh_CN.json'

//配置
veeValidate.configure({
  generateMessage: localize('zh_CN', zh_CN),
  //input事件时验证
  validateOnInput: true,
})
//批量定义规则
Object.keys(rules).forEach((key) => {
  veeValidate.defineRule(key, rules[key])
})

//指定设置useField
const useFields = (fields: string[]) => {
  fields.forEach((field) => veeValidate.useField(field))
}
export default { yup, ...veeValidate, useFields }
