(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d0cf74f"],{6494:function(e,t,r){"use strict";r.r(t);var s=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",{staticClass:"Main"},["user"!=e.$route.name&&"myTask"!=e.$route.name?r("van-nav-bar",{style:"promote"==e.$route.name?"background:transparent":"",attrs:{fixed:"",border:!1,title:e.navBarTitle,"left-arrow":"user"!=e.$route.name,"right-text":e.rightText},on:{"click-left":e.onClickLeft,"click-right":e.onClickRight}}):e._e(),r("router-view")],1)},a=[],i={name:"UserCenter",components:{},props:[],data(){return{rightText:"",navBarTitle:""}},computed:{},watch:{$route(e,t){switch(e.name){case"recharge":this.rightText=this.$t("recharge.default[2]");break;case"postRecord":this.rightText="发布";break;case"newLc":this.rightText="购买记录";break;default:this.rightText=""}}},created(){switch(this.$route.name){case"recharge":this.rightText=this.$t("recharge.default[2]");break;case"postRecord":this.rightText="发布";break;case"newLc":this.rightText="购买记录";break;default:this.rightText=""}},mounted(){},activated(){},destroyed(){},methods:{onClickLeft(){switch(this.$route.name){case"taskRecord":case"postRecord":case"auditRecord":this.$router.push("/user");break;case"recharge":this.$children[1].showPrice?this.$children[1].showPrice=!1:this.$router.go(-1);break;default:this.$router.go(-1)}},onClickRight(){"recharge"==this.$route.name&&this.$router.push("/user/wallet"),"postRecord"==this.$route.name&&this.$router.push("/user/postTask"),"newLc"==this.$route.name&&this.$router.push("/user/newlist")}}},h=i,c=r("2877"),o=Object(c["a"])(h,s,a,!1,null,"1b1140ea",null);t["default"]=o.exports}}]);