(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-8d399c14"],{"15d8":function(t,a,e){"use strict";e.r(a);var i=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"PageBox",style:2==t.infoData.o_status&&"padding-bottom: 44px"},[t.infoData?e("div",{staticClass:"ScrollBox"},[e("div",{staticClass:"Details"},[e("dl",[e("dd",[e("label",[t._v("任务标题：")]),e("span",[t._v(t._s(t.infoData.title))])]),e("dd",[e("label",[t._v("任务金额：")]),e("span",[e("i",[t._v(t._s(t.infoData.reward_price))]),t._v("元")])]),e("dd",{staticStyle:{"padding-top":"0","justify-content":"space-between"}},[e("em",[t._v(t._s(t.infoData.y_surplus_number)+"人已完成")]),e("em",[t._v("剩余"+t._s(t.infoData.surplus_number)+"个名额")])]),e("dd",{staticStyle:{"border-top":"1px #eee solid","padding-top":"13px"}},[e("label",[t._v("任务描述：")]),e("span",[t._v(t._s(t.infoData.content))])]),e("dd",[e("label",[t._v("链接信息：")]),e("span",[t._v(t._s(t.infoData.link_info))])]),e("dd",[e("label",[t._v("审核样例：")]),e("div",{staticStyle:{display:"flex","flex-wrap":"wrap"}},t._l(t.infoData.examine_demo,(function(a,i){return e("van-image",{key:i,attrs:{fit:"cover",width:"49",src:""+t.ApiUrl+a},on:{click:function(e){return t.$ImagePreview([""+t.ApiUrl+a])}}})})),1)])]),e("dl",{staticStyle:{"border-top":"10px #eee solid"}},[e("dt",{staticStyle:{"justify-content":"flex-start"}},[e("label",[e("img",{staticStyle:{"border-radius":"100%","vertical-align":"middle","margin-right":"10px"},attrs:{src:"./static/head/"+t.infoData.j_header,height:"40"}})]),e("span",[e("p",[t._v("领取用户")]),e("div",{staticStyle:{display:"flex","justify-content":"space-between","align-items":"center"}},[t._v(t._s(t.infoData.j_username)+" "),e("em",{staticStyle:{color:"#999","font-size":"12px"}},[t._v(t._s(t.infoData.add_time)+" 领取")])])])]),e("dd",{staticStyle:{"border-top":"1px #eee solid","padding-top":"13px"}},[e("label",[t._v("完成状态：")]),e("span",{class:"state"+t.infoData.o_status},[t._v(t._s(t.infoData.o_status_dec))])]),1!=t.infoData.o_status?e("dd",[e("label",[t._v("提交样例：")]),t.infoData.o_examine_demo.length?e("div",t._l(t.infoData.o_examine_demo,(function(a,i){return e("van-image",{key:i,attrs:{fit:"cover",width:"49",height:"49",src:""+t.ApiUrl+a},on:{click:function(e){return t.$ImagePreview([""+t.ApiUrl+a])}}})})),1):e("span",[t._v("用户未提交样例")])]):t._e(),6!=t.infoData.o_status?e("dd",[e("label",[t._v("更新日期：")]),e("span",[t._v(t._s(t.infoData.trial_time))])]):t._e()])])]):t._e(),t.isLoad?e("van-loading",{staticClass:"DataLoad",attrs:{size:"60px",vertical:""}},[t._v("数据加载中...")]):t._e(),2==t.infoData.o_status?e("div",{staticStyle:{position:"fixed",bottom:"0",width:"100%",display:"flex","align-items":"center","justify-content":"space-between",padding:"10px 5px"}},[e("van-button",{staticStyle:{"font-size":"14px",flex:"1",margin:"0 5px"},attrs:{type:"warning",size:"small"},on:{click:function(a){return t.onSubmit(5)}}},[t._v("恶意")]),e("van-button",{staticStyle:{"font-size":"14px",flex:"1",margin:"0 5px"},attrs:{type:"info",size:"small"},on:{click:function(a){return t.onSubmit(2)}}},[t._v("重审")]),e("van-button",{staticStyle:{"font-size":"14px",flex:"1",margin:"0 5px"},attrs:{color:"#aaa",size:"small"},on:{click:function(a){return t.onSubmit(4)}}},[t._v("失败")]),e("van-button",{staticStyle:{"font-size":"14px",flex:"1",margin:"0 5px"},attrs:{type:"danger",size:"small"},on:{click:function(a){return t.onSubmit(3)}}},[t._v("成功")])],1):t._e(),e("van-dialog",{attrs:{title:"审核任务","show-cancel-button":"","close-on-popstate":"","close-on-click-overlay":""},on:{confirm:t.confirmSubmit,closed:function(a){t.auditRemarks=""}},model:{value:t.showDialog,callback:function(a){t.showDialog=a},expression:"showDialog"}},[e("van-field",{staticStyle:{padding:"16px"},attrs:{"label-width":"70",rows:"1",autosize:"",label:"审核说明:",type:"textarea",placeholder:"请输入审核说明",autosize:{maxHeight:50},clearable:""},model:{value:t.auditRemarks,callback:function(a){t.auditRemarks=a},expression:"auditRemarks"}})],1)],1)},s=[],n={name:"Show",components:{},props:["auditId"],data(){return{isLoad:!0,infoData:"",showDialog:!1,auditRemarks:"",currState:2}},computed:{},watch:{},created(){this.$parent.navBarTitle="审核详情",this.getTaskinfo()},mounted(){},activated(){},destroyed(){},methods:{getTaskinfo(){this.$Model.TaskOrderInfo(this.auditId,t=>{this.isLoad=!1,1==t.code&&(this.infoData=t.info)})},onSubmit(t){switch(this.currState=t,this.showDialog=!0,t){case 2:this.auditRemarks="提交的任务不合格，需重新提交审核";break;case 3:this.auditRemarks="恭喜任务完成，再接再厉";break;case 4:this.auditRemarks="提交的任务页面截图错误，任务失败";break;case 5:this.auditRemarks="恶意提交任务，任务失败";break}},confirmSubmit(){this.$Model.AuditTask({order_id:this.auditId,handle_remarks:this.auditRemarks,status:this.currState},t=>{1==t.code&&this.getTaskinfo()})}}},o=n,l=(e("cb6c"),e("2877")),r=Object(l["a"])(o,i,s,!1,null,"2b3fe830",null);a["default"]=r.exports},"5fcc":function(t,a,e){},cb6c:function(t,a,e){"use strict";var i=e("5fcc"),s=e.n(i);s.a}}]);