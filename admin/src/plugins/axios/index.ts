import { CacheEnum } from '@/enum/cacheEnum'
import store from '@/utils/store'
import Axios from './Axios'
console.log(store.get(CacheEnum.TOKEN_NAME));
const http = new Axios({
    baseURL: '/api',
    timeout: 10000,
    headers: {
        'Authorization': 'Bearer ' + store.get(CacheEnum.TOKEN_NAME),
    },
})

export { http }
