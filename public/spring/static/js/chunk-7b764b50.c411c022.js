(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-7b764b50"],{"524c":function(t,e,n){"use strict";var o=n("f761"),a=n.n(o);a.a},c3ef:function(t,e,n){"use strict";n.r(e);var o=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"Main"},[n("van-nav-bar",{attrs:{fixed:"",border:!1,title:t.$t("help[0]"),"left-arrow":""},on:{"click-left":function(e){return t.$router.go(-1)}}}),n("div",{staticClass:"PageBox"},[n("div",{staticClass:"ScrollBox"},[t._l(t.InitData.helpList,(function(e){return n("van-cell",{key:e.id,attrs:{size:"large",title:e.title,"is-link":""},on:{click:function(n){return t.openShow(e)}}})})),t.InitData.helpList.length?t._e():n("van-empty",{attrs:{description:t.$t("help[1]")}})],2)]),n("van-popup",{staticStyle:{width:"100%",height:"100%","background-color":"#7669fd",color:"#fff"},attrs:{position:"bottom",closeable:"","close-on-popstate":""},model:{value:t.showCon,callback:function(e){t.showCon=e},expression:"showCon"}},[n("div",{staticClass:"ScrollBox",staticStyle:{padding:"16px 20px"}},[n("h3",{staticStyle:{"text-align":"center","margin-bottom":"20px"}},[t._v(t._s(t.infoData.title))]),n("div",{staticClass:"Content",staticStyle:{"text-align":"justify"},domProps:{innerHTML:t._s(t.infoData.content)}})])])],1)},a=[],i={name:"Help",components:{},props:[],data(){return{showCon:!1,infoData:""}},computed:{},watch:{},created(){},mounted(){},activated(){},destroyed(){},methods:{openShow(t){this.showCon=!0,this.infoData=t}}},s=i,c=(n("524c"),n("2877")),l=Object(c["a"])(s,o,a,!1,null,"5f683c38",null);e["default"]=l.exports},f761:function(t,e,n){}}]);