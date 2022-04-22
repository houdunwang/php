<script setup lang="ts">
import v from '@/plugins/validate'
import utils from '@/utils'
const { useForm, yup, useFields } = v
const rules = yup.object({
  account: yup
    .string()
    .label('帐号')
    .matches(/^\d{11}|.+@.+$/, '请输入邮箱或手机号')
    .required(),
  password: yup.string().label('密码').required().min(3),
})
const { handleSubmit, errors, values } = useForm({
  validationSchema: rules,
})

useFields(Object.keys(rules.fields))
const onSubmit = handleSubmit((values: any) => {
  utils.user.login(values)
})
</script>

<template>
  <form @submit="onSubmit">
    <div
      class="w-[720px] translate-y-32 md:translate-y-0 bg-white md:grid grid-cols-2 rounded-md shadow-md overflow-hidden">
      <div class="p-6 flex flex-col justify-between">
        <div>
          <h2 class="text-center text-gray-700 text-lg mt-3">会员登录</h2>
          <div class="mt-8">
            <hd-input v-model="values.account" />
            <hd-error :error="errors.account" />
            <hd-input v-model="values.password" class="mt-3" />
            <hd-error :error="errors.password" />
          </div>
          <HdButton class="w-full" />
          <div class="flex justify-center mt-3">
            <icon-wechat
              theme="outline"
              size="24"
              fill="#fff"
              class="fab fa-weixin bg-green-600 text-white rounded-full p-1 cursor-pointer" />
          </div>
        </div>
        <div class="flex gap-2 justify-center mt-5">
          <a href="#" class="text-xs text-gray-700">会员注册</a>
          <a href="#" class="text-xs text-gray-700">找回密码</a>
          <a href="#" class="text-xs text-gray-700">找回密码</a>
        </div>
      </div>
      <div class="hidden md:block relative">
        <img src="/images/login.jpg" class="absolute h-full w-full object-cover" />
      </div>
    </div>
  </form>
</template>

<style lang="scss">
form {
  @apply bg-slate-300 h-screen flex justify-center items-start md:items-center p-5;
}
</style>
