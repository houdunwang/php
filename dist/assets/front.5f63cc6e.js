import{c as i}from"./core.5cf26b24.js";import{d as m}from"./pinia.3af4ac7f.js";import{C as p,bl as s,a0 as n,o as a,G as c}from"./@vue.ac3c99c7.js";import"./index.79763af7.js";import"./vue-router.c9c8876f.js";import"./@icon-park.f131a0de.js";import"./axios.af22a90f.js";import"./element-plus.da21f900.js";import"./dayjs.0c888375.js";import"./@kangc.1996ede0.js";import"./vue.3a73d106.js";import"./@vueuse.bdb320bd.js";import"./@element-plus.9265bdf6.js";import"./lodash-es.e24100a0.js";import"./async-validator.6019f6c6.js";import"./@sxzz.69bffcbd.js";import"./escape-html.d3a2e952.js";import"./normalize-wheel-es.25faf228.js";import"./@ctrl.46158b0f.js";/* empty css                    */import"./prismjs.80502f0c.js";import"./vee-validate.c3c37b64.js";import"./@vee-validate.898c8da1.js";import"./yup.eb539db0.js";import"./nanoclone.5d6f781b.js";import"./lodash.41eab2cc.js";import"./property-expr.8748984a.js";import"./toposort.bf2a2d8a.js";import"./vue-demi.fd44cc08.js";var _=m("siteStore",{state:()=>({site:{}}),actions:{async getCurrentSite(){this.site=await i()}}});const Q=p({__name:"front",async setup(u){let t,r;const o=_();return[t,r]=s(()=>o.getCurrentSite()),await t,r(),(f,l)=>{const e=n("router-view");return a(),c(e)}}});export{Q as default};