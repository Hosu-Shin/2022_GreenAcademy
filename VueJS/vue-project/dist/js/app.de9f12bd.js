(function(){"use strict";var o={9663:function(o,t,e){var n=e(9242),d=e(3396);const a={id:"app"};function r(o,t,e,n,r,s){const l=(0,d.up)("TodoHeader"),i=(0,d.up)("TodoInput"),c=(0,d.up)("TodoList"),u=(0,d.up)("TodoFooter"),h=(0,d.up)("AlertModal");return(0,d.wg)(),(0,d.iD)(d.HY,null,[(0,d._)("div",a,[(0,d.Wm)(l),(0,d.Wm)(i,{onChildAddTodo:s.addTodo,onOpenModal:s.openModal},null,8,["onChildAddTodo","onOpenModal"]),(0,d.Wm)(c,{propsItems:r.todoItems,onChildRemoveTodo:s.removeTodo},null,8,["propsItems","onChildRemoveTodo"]),(0,d.Wm)(u,{onChildClearAllTodo:s.clearTodo},null,8,["onChildClearAllTodo"])]),(0,d.Wm)(h,{show:r.modalShow,header:"알림창",body:"내용을 입력해 주세요.",onClose:t[0]||(t[0]=o=>r.modalShow=!1)},null,8,["show"])],64)}const s=(0,d._)("h1",null,"To Do it!",-1),l=[s];function i(o,t,e,n,a,r){return(0,d.wg)(),(0,d.iD)("header",null,l)}var c={},u=e(89);const h=(0,u.Z)(c,[["render",i]]);var m=h;const p={class:"inputBox shadow"},f=(0,d._)("i",{class:"addBtn fas fa-plus","aria-hidden":"true"},null,-1),v=[f];function T(o,t,e,a,r,s){return(0,d.wg)(),(0,d.iD)("div",p,[(0,d.wy)((0,d._)("input",{type:"text","onUpdate:modelValue":t[0]||(t[0]=o=>r.newTodoItem=o),onKeyup:t[1]||(t[1]=(0,n.D2)(((...o)=>s.addTodo&&s.addTodo(...o)),["enter"])),placeholder:"Type what you have to do"},null,544),[[n.nr,r.newTodoItem]]),(0,d._)("span",{class:"addContainer",onClick:t[2]||(t[2]=(...o)=>s.addTodo&&s.addTodo(...o))},v)])}var w={data(){return{newTodoItem:""}},methods:{addTodo(){if(""!==this.newTodoItem.trim()){const o=this.newTodoItem&&this.newTodoItem.trim();this.$emit("childAddTodo",o)}else this.$emit("openModal");this.newTodoItem=""}}};const g=(0,u.Z)(w,[["render",T]]);var _=g,I=e(7139);const y=o=>((0,d.dD)("data-v-dce7ab62"),o=o(),(0,d.Cn)(),o),b=y((()=>(0,d._)("i",{class:"checkBtn fas fa-check","aria-hidden":"true"},null,-1))),C={class:"grow_1 d-flex flex-col justify_content_evenly"},k={class:"ctnt"},O={class:"small_text"},x=["onClick"],A=y((()=>(0,d._)("i",{class:"far fa-trash-alt","aria-hidden":"true"},null,-1))),D=[A];function S(o,t,e,a,r,s){return(0,d.wg)(),(0,d.iD)("section",null,[(0,d.Wm)(n.W3,{name:"list",tag:"ul"},{default:(0,d.w5)((()=>[((0,d.wg)(!0),(0,d.iD)(d.HY,null,(0,d.Ko)(e.propsItems,(o=>((0,d.wg)(),(0,d.iD)("li",{key:o.itodo,class:"shadow"},[b,(0,d._)("div",C,[(0,d._)("div",k,(0,I.zw)(o.todo),1),(0,d._)("div",O,(0,I.zw)(o.created_at),1)]),(0,d._)("span",{class:"removeBtn",type:"button",onClick:t=>s.removeTodo(o.itodo)},D,8,x)])))),128))])),_:1})])}var j={props:{propsItems:Array},methods:{removeTodo(o){this.$emit("childRemoveTodo",o)}}};const W=(0,u.Z)(j,[["render",S],["__scopeId","data-v-dce7ab62"]]);var $=W;const M={class:"clearAllContainer"};function B(o,t,e,n,a,r){return(0,d.wg)(),(0,d.iD)("div",M,[(0,d._)("span",{class:"clearAllBtn",onClick:t[0]||(t[0]=(...o)=>r.clearTodo&&r.clearTodo(...o))},"Clear All")])}var H={methods:{clearTodo(){this.$emit("childClearAllTodo")}}};const Z=(0,u.Z)(H,[["render",B]]);var z=Z;const E={key:0,class:"modal-mask"},F={class:"modal-wrapper"},K={class:"modal-container"},R={class:"modal-header"},U={class:"modal-body"},V={class:"modal-footer"};function L(o,t,e,a,r,s){return(0,d.wg)(),(0,d.j4)(n.uT,{name:"modal"},{default:(0,d.w5)((()=>[e.show?((0,d.wg)(),(0,d.iD)("div",E,[(0,d._)("div",F,[(0,d._)("div",K,[(0,d._)("div",R,[(0,d.WI)(o.$slots,"header",{},(()=>[(0,d.Uk)((0,I.zw)(e.header),1)]))]),(0,d._)("div",U,[(0,d.WI)(o.$slots,"body",{},(()=>[(0,d.Uk)((0,I.zw)(e.body),1)]))]),(0,d._)("div",V,[(0,d.WI)(o.$slots,"footer",{},(()=>[(0,d._)("button",{class:"modal-default-button",onClick:t[0]||(t[0]=t=>o.$emit("close"))},"OK")]))])])])])):(0,d.kq)("",!0)])),_:3})}var P={props:{show:Boolean,header:String,body:String}};const Y=(0,u.Z)(P,[["render",L]]);var q=Y,J=e(6265),N=e.n(J),G={getTimestamp:function(o){return o.setHours(o.getHours()+9),o.toISOString().replace("T"," ").substring(0,19)}},Q={name:"App",data(){return{todoItems:[],cnt:0,modalShow:!1}},methods:{openModal(){this.modalShow=!0},addTodo(o){const t={todo:o};N().post("/todo/index",t).then((t=>{if(200===t.status&&t.data){const e={itodo:t.data.result,todo:o,created_at:G.getTimestamp(new Date)};this.todoItems.push(e)}}))},removeTodo(o){this.todoItems.forEach(((t,e)=>{t.itodo===o&&(this.todoItems.splice(e,1),N()["delete"](`/todo/index/${t.itodo}`).then((o=>{console.log(o)})))}))},clearTodo(){N()["delete"]("/todo/index").then((o=>{200===o.status&&o.data.result&&this.todoItems.splice(0)}))},changeValue(){const o=JSON.stringify(this.todoItems);localStorage.setItem("todoItems",o),localStorage.setItem("cnt",this.cnt)}},components:{TodoHeader:m,TodoInput:_,TodoList:$,TodoFooter:z,AlertModal:q},watch:{todoItems:{deep:!0,handler(){this.changeValue()}}},created(){N().get("/todo/index").then((o=>{console.log(o),200===o.status&&o.data.length>0&&o.data.forEach((o=>{this.todoItems.push(o)}))}))}};const X=(0,u.Z)(Q,[["render",r]]);var oo=X;(0,n.ri)(oo).mount("#app")}},t={};function e(n){var d=t[n];if(void 0!==d)return d.exports;var a=t[n]={exports:{}};return o[n](a,a.exports,e),a.exports}e.m=o,function(){var o=[];e.O=function(t,n,d,a){if(!n){var r=1/0;for(c=0;c<o.length;c++){n=o[c][0],d=o[c][1],a=o[c][2];for(var s=!0,l=0;l<n.length;l++)(!1&a||r>=a)&&Object.keys(e.O).every((function(o){return e.O[o](n[l])}))?n.splice(l--,1):(s=!1,a<r&&(r=a));if(s){o.splice(c--,1);var i=d();void 0!==i&&(t=i)}}return t}a=a||0;for(var c=o.length;c>0&&o[c-1][2]>a;c--)o[c]=o[c-1];o[c]=[n,d,a]}}(),function(){e.n=function(o){var t=o&&o.__esModule?function(){return o["default"]}:function(){return o};return e.d(t,{a:t}),t}}(),function(){e.d=function(o,t){for(var n in t)e.o(t,n)&&!e.o(o,n)&&Object.defineProperty(o,n,{enumerable:!0,get:t[n]})}}(),function(){e.g=function(){if("object"===typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(o){if("object"===typeof window)return window}}()}(),function(){e.o=function(o,t){return Object.prototype.hasOwnProperty.call(o,t)}}(),function(){var o={143:0};e.O.j=function(t){return 0===o[t]};var t=function(t,n){var d,a,r=n[0],s=n[1],l=n[2],i=0;if(r.some((function(t){return 0!==o[t]}))){for(d in s)e.o(s,d)&&(e.m[d]=s[d]);if(l)var c=l(e)}for(t&&t(n);i<r.length;i++)a=r[i],e.o(o,a)&&o[a]&&o[a][0](),o[a]=0;return e.O(c)},n=self["webpackChunkvue_project"]=self["webpackChunkvue_project"]||[];n.forEach(t.bind(null,0)),n.push=t.bind(null,n.push.bind(n))}();var n=e.O(void 0,[998],(function(){return e(9663)}));n=e.O(n)})();
//# sourceMappingURL=app.de9f12bd.js.map