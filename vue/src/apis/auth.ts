import { http } from '@/plugins/axios'

export type ResponseData = {
  user: UserModel
  token: string
}

export function apiLogin(data: { account: string; password: string }) {
  return http.request<ResponseData>({
    url: `login`,
    method: 'post',
    data,
  })
}

export interface RegisterFormData {
  account: string
  password: string
  password_confirmation: string
  code: string
}

export function apiRegister(data: RegisterFormData) {
  return http.request<ResponseData>({
    url: `register`,
    method: 'post',
    data,
  })
}

export interface ForgetPasswordFormData {
  account: string
  password: string
  password_confirmation: string
  code: string
}

export function apiForgetPassword(data: ForgetPasswordFormData) {
  return http.request<ResponseData>({
    url: 'account/forget-password',
    method: 'post',
    data,
  })
}