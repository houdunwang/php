interface UserModel {
  avatar: string
  permissions: string[]
  id: number
  name: string
  sex: number
  email: string
  real_name?: any
  home?: any
  weibo?: any
  wechat?: any
  github?: any
  qq?: any
  wakatime?: any
  email_verified_at: string
  mobile_verified_at?: any
  created_at: string
  updated_at: string
  lock?: any
  credit1?: any
  credit2?: any
  credit3?: any
  credit4?: any
  credit5?: any
  credit6?: any
  favour_count: number
  favorite_count: number
  is_super_admin: boolean
  roles: RoleModel[]
}

type RoleModel = {
  id: number
  name: string
  title: string
  guard_name: string
  created_at: string
  updated_at: string
  permissions: PermissionModel[]
}

type PermissionModel = {
  id: number
  name: string
  title: string
  module: string
  guard_name: string
  created_at: string
  updated_at: string
}

type SiteModel = {
  id: number
  title: string
  url: string
  tel: string
  address: string
  email: string
  config?: any
  user_id: number
  created_at: string
  updated_at: string
  master: UserModel
}

type SystemModel = {
  id: number
  config: {
    site: {
      title: string
      logo: string
      copyright: string
    }
    code: {
      expire: string
      length: number
      timeout: number
    }
    aliyun: {
      access_key_id?: any
      sms_sign_name: string
      access_key_secret?: any
    }
    avatar: {
      width: string
      height: string
    }
    upload: {
      size: number
      mimes: string
    }
  }
}

type ModuleModel = {
  id: number
  title: string
  name: string
  version: string
  author: string
  perview: string
}
