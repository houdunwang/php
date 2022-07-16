import{d as M,C as g,v as O,o,c as _,a as n,b as c,u as l,Q as w,ad as x,G as f,L as R,P as k,I as j,J as A,K as C,H as v,O as b,a0 as z,V as N,bl as S,T as V}from"./@vue.ac3c99c7.js";import{r as B,R as E,u as T}from"./index.79763af7.js";import{_ as P,b as U,c as G}from"./@icon-park.f131a0de.js";import{_ as J,a as K,s as Q}from"./systemStore.b8bc767f.js";import{c as W,d as q}from"./element-plus.da21f900.js";import{_ as X}from"./plugin-vue_export-helper.21dcd24c.js";import"./vue-router.c9c8876f.js";import"./pinia.3af4ac7f.js";import"./vue-demi.fd44cc08.js";import"./axios.af22a90f.js";/* empty css                    */import"./dayjs.0c888375.js";import"./@kangc.1996ede0.js";import"./vue.3a73d106.js";import"./prismjs.80502f0c.js";import"./vee-validate.c3c37b64.js";import"./@vee-validate.898c8da1.js";import"./yup.eb539db0.js";import"./nanoclone.5d6f781b.js";import"./lodash.41eab2cc.js";import"./property-expr.8748984a.js";import"./toposort.bf2a2d8a.js";import"./@vueuse.bdb320bd.js";import"./@element-plus.9265bdf6.js";import"./lodash-es.e24100a0.js";import"./async-validator.6019f6c6.js";import"./@sxzz.69bffcbd.js";import"./escape-html.d3a2e952.js";import"./normalize-wheel-es.25faf228.js";import"./@ctrl.46158b0f.js";import"./system.9934b6db.js";const Y=B.getRoutes().filter(m=>m.children.length).filter(m=>m.meta.menu).sort((m,e)=>{var i,s;return((i=m.meta.order)!=null?i:100)-((s=e.meta.order)!=null?s:100)}),Z=M(!0),h=M([]);var D=()=>({routes:Y,show:Z,go:e=>{h.value.length==20&&h.value.pop(),h.value.find(s=>s.name==e.name)||h.value.unshift(e),B.push(e)},history:h});const ee={class:"admin-menu"},te={class:"logo cursor-pointer"},ne={class:"container"},oe={class:"text-md"},ae=["onClick"],ie=n("div",{class:"bg block md:hidden"},null,-1),se=g({__name:"menu",setup(m){const{routes:e,show:i,go:s}=D();return O(()=>{document.documentElement.addEventListener("click",r=>{document.documentElement.clientWidth<640&&(i.value=!1)})}),(r,a)=>{const d=P;return o(),_("div",ee,[n("div",{class:C(["menu",{hidden:!l(i)}])},[n("div",te,[c(d,{theme:"outline",size:"18",fill:"#dcdcdc",class:"mr-2",onClick:a[0]||(a[0]=t=>r.$router.push({name:l(E).HOME}))}),n("span",{class:"text-md cursor-pointer",onClick:a[1]||(a[1]=t=>r.$router.push({name:l(E).ADMIN}))},"\u665A\u516B\u70B9\u76F4\u64AD")]),n("div",ne,[(o(!0),_(w,null,x(l(e),(t,p)=>{var u,$;return o(),_("dl",{key:p},[n("dt",null,[n("section",null,[(o(),f(R((u=t.meta.menu)==null?void 0:u.icon),{size:"15",fill:"#dcdcdc",class:"mr-2"})),n("span",oe,k(($=t.meta.menu)==null?void 0:$.title),1)])]),n("dd",null,[(o(!0),_(w,null,x(t.children,(y,H)=>{var F,I,L;return j((o(),_("div",{key:H,onClick:ke=>l(s)(y),class:C({active:r.$route.name==y.name})},k((I=(F=y.meta)==null?void 0:F.menu)==null?void 0:I.title),11,ae)),[[A,(L=y.meta)==null?void 0:L.menu]])}),128))])])}),128))])],2),ie])}}}),re=b("\u9996\u9875"),ce=g({__name:"breadcrumb",setup(m){const e=B.currentRoute;return(i,s)=>{const r=W,a=q;return o(),f(a,{separator:"/"},{default:v(()=>{var d;return[c(r,{to:{name:l(E).HOME}},{default:v(()=>[re]),_:1},8,["to"]),(o(!0),_(w,null,x((d=l(e))==null?void 0:d.matched,(t,p)=>(o(),f(r,{to:{path:t.path},key:p},{default:v(()=>{var u;return[b(k((u=t.meta.menu)==null?void 0:u.title),1)]}),_:2},1032,["to"]))),128))]}),_:1})}}}),me={class:"bg-white relative shadow-sm z-50 p-2 border-b-1 px-5 flex justify-between items-center"},de={class:"flex items-center"},le={class:"flex justify-center items-center relative cursor-pointer"},ue=b("\u7F51\u7AD9\u9996\u9875"),_e=b("\u7CFB\u7EDF\u5E73\u53F0"),pe=g({__name:"navbar",setup(m){const{show:e}=D();return(i,s)=>{const r=U,a=G,d=ce,t=z("router-link"),p=J,u=K;return o(),_("div",me,[n("div",de,[n("div",{class:"mr-2",onClick:s[0]||(s[0]=N($=>e.value=!l(e),["stop"]))},[l(e)?(o(),f(r,{key:0,theme:"filled",size:"24",fill:"#10ad57",class:"cursor-pointer duration-300"})):(o(),f(a,{key:1,theme:"filled",size:"24",fill:"#10ad57",class:"cursor-pointer duration-300"}))]),c(d,{class:"hidden md:block"})]),n("div",le,[c(t,{to:"/",class:"mr-2 text-sm text-gray-600 md:hidden"},{default:v(()=>[ue]),_:1}),c(t,{to:{name:"core"},class:"mr-2 text-sm text-gray-600"},{default:v(()=>[_e]),_:1}),c(p,{class:"hidden md:flex mr-3 text-gray-600"}),c(u,{class:"text-gray-500"})])])}}}),ve={class:"hidden md:block p-2 border-t border-b bg-gray-50 shadow-sm"},fe={class:"grid grid-flow-col gap-2 justify-start"},he=g({__name:"historyLink",setup(m){const{history:e}=D();return(i,s)=>{const r=z("router-link");return j((o(),_("div",ve,[n("div",fe,[(o(!0),_(w,null,x(l(e),a=>(o(),f(r,{to:{name:a.name},class:C(["border hover:bg-teal-600 hover:text-white duration-300 bg-white rounded-md shadow-sm py-2 px-3 flex items-center justify-center text-xs",{"bg-teal-600 text-white":i.$route.name==a.name}])},{default:v(()=>{var d,t;return[b(k((t=(d=a.meta)==null?void 0:d.menu)==null?void 0:t.title),1)]}),_:2},1032,["to","class"]))),256))])],512)),[[A,l(e).length]])}}});const ge={class:"admin h-screen w-screen grid md:grid-cols-[auto_1fr]"},be={class:"content bg-gray-100 grid grid-rows-[auto_1fr]"},ye={class:"m-3 relative overflow-y-auto"},we={class:"absolute w-full"},xe=g({__name:"admin",async setup(m){let e,i;return[e,i]=S(()=>Promise.all([T().getUserInfo(),Q().load()])),await e,i(),(s,r)=>{const a=z("router-view");return o(),_("div",ge,[c(se),n("div",be,[n("div",null,[c(pe),c(he)]),n("div",ye,[c(a,null,{default:v(({Component:d,route:t})=>{var p,u;return[c(V,{appear:"",class:"animate__animated","enter-active-class":(p=t.meta.enterClass)!=null?p:"animate__fadeInRight","leave-active-class":(u=t.meta.leaveClass)!=null?u:"animate__fadeOutLeft"},{default:v(()=>[n("div",we,[(o(),f(R(d)))])]),_:2},1032,["enter-active-class","leave-active-class"])]}),_:1})])])])}}});var tt=X(xe,[["__scopeId","data-v-0c9b04d5"]]);export{tt as default};