import{h as r,r as d}from"./index.79763af7.js";import{y as s}from"./element-plus.da21f900.js";import{d as n}from"./@vue.ac3c99c7.js";function l(e=1,u={}){return r.request({url:`module?page=${e}&`+Object.entries(u).map(t=>t.join("=")).join("&")})}function i(e){return r.request({url:`module/${e}`,method:"DELETE"})}function m(e){return r.request({url:"module",data:e,method:"POST"})}var E=()=>{const e=n(),u=n(),t=d.currentRoute.value.query.sid,a=async()=>{e.value=await l()};return{sid:t,modules:e,module:u,load:a,add:async o=>{await m(o),d.push({name:"module.index"})},del:async o=>{await s.confirm("\u786E\u5B9A\u5220\u9664\u5417?"),await i(o),a()}}};export{E as u};