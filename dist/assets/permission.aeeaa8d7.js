import{n as O,g as T,h as z}from"./element-plus.da21f900.js";import{h as B,r as C,f as G}from"./index.79763af7.js";import{u as H}from"./useRole.55da995b.js";import{d as E,C as L,bl as w,o,c as r,b as d,u as a,Q as _,ad as f,G as M,H as x,a as i,P as m,I as Q,a5 as U,O as k}from"./@vue.ac3c99c7.js";import{_ as j}from"./tab.4d64a4e2.js";import{_ as J}from"./plugin-vue_export-helper.21dcd24c.js";import"./dayjs.0c888375.js";import"./@kangc.1996ede0.js";import"./vue.3a73d106.js";import"./@vueuse.bdb320bd.js";import"./@element-plus.9265bdf6.js";import"./lodash-es.e24100a0.js";import"./async-validator.6019f6c6.js";import"./@sxzz.69bffcbd.js";import"./escape-html.d3a2e952.js";import"./normalize-wheel-es.25faf228.js";import"./@ctrl.46158b0f.js";import"./vue-router.c9c8876f.js";import"./@icon-park.f131a0de.js";import"./pinia.3af4ac7f.js";import"./vue-demi.fd44cc08.js";import"./axios.af22a90f.js";/* empty css                    */import"./prismjs.80502f0c.js";import"./vee-validate.c3c37b64.js";import"./@vee-validate.898c8da1.js";import"./yup.eb539db0.js";import"./nanoclone.5d6f781b.js";import"./lodash.41eab2cc.js";import"./property-expr.8748984a.js";import"./toposort.bf2a2d8a.js";import"./tab.1aa9c22c.js";function K(e,t,s){return B.request({url:`site/${e}/role/${t}/permission`,method:"POST",data:{permissions:s}})}var W=()=>{const e=C.currentRoute.value.query.sid;return{sid:e,update:async(s,l)=>{await K(e,s,l)}}};function X(e){return B.request({url:`site/${e}/permission`})}var Y=()=>{const e=E(),t=C.currentRoute.value.query.sid;return{sid:t,permissions:e,getPermission:async()=>{e.value=await X(t)}}};const Z={class:"text-base"},tt={class:"w-full"},et={class:"text-gray-600 text-sm font-bold pb-1"},st={class:"grid md:grid-cols-3 lg:grid-cols-6 grid-cols-1 text-sm text-gray-600 mb-3"},ot={class:"flex items-center"},rt={class:"text-xs flex items-center mb-1"},it=["value"],at={class:"text-xs text-gray-500"},nt=k("\u4FDD\u5B58\u63D0\u4EA4"),mt=L({__name:"permission",async setup(e){var h,g;let t,s;const{site:l,currentSite:S}=G(),{role:v,current:$,id:D}=H(),{update:q}=W(),{getPermission:R,permissions:V}=Y();[t,s]=w(async()=>Promise.all([([t,s]=w(()=>S()),t=await t,s(),t),$(),R()])),await t,s();const p=E((g=(h=v.value)==null?void 0:h.permissions.map(y=>y.name))!=null?g:[]);return(y,n)=>{var b;const A=O,F=T,N=z;return o(),r("div",null,[d(j,{site:a(l)},null,8,["site"]),d(A,{title:`\u3010${(b=a(v))==null?void 0:b.name}\u3011\u6743\u9650\u8BBE\u7F6E`,type:"success","show-icon":"",effect:"light"},null,8,["title"]),(o(!0),r(_,null,f(a(V).data,u=>(o(),M(F,{shadow:"hover","body-style":{padding:"20px"},class:"mb-3"},{header:x(()=>[i("h6",Z,m(u.title),1)]),default:x(()=>[(o(!0),r(_,null,f(u.permission,P=>(o(),r("dl",tt,[i("dt",et,m(P.title),1),i("dd",st,[(o(!0),r(_,null,f(P.items,c=>(o(),r("div",ot,[i("label",rt,[Q(i("input",{type:"checkbox","onUpdate:modelValue":n[0]||(n[0]=I=>p.value=I),value:c.name,class:"mr-1"},null,8,it),[[U,p.value]]),k(" "+m(c.title)+" ",1),i("span",at,m(c.name),1)])]))),256))])]))),256))]),_:2},1024))),256)),d(N,{type:"primary",size:"default",onClick:n[1]||(n[1]=u=>a(q)(a(D),p.value))},{default:x(()=>[nt]),_:1})])}}});var Gt=J(mt,[["__scopeId","data-v-6cbe630d"]]);export{Gt as default};