import { CacheEnum } from './../enum/cacheEnum';
import userApi from '@/apis/userApi'
import store from '@/utils/store'
import { defineStore } from 'pinia'

export default defineStore('userStore', {
    state: () => {
        return {
            info: {} as null | IUser,
        }
    },
    actions: {
        async getUserInfo() {

            if (store.get(CacheEnum.TOKEN_NAME)) {
                const res = await userApi.info()
                this.info = res.data
            }
        },
    },
})
