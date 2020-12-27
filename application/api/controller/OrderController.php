<?php 
namespace app\api\controller;

use app\api\controller\BaseController;
use think\facade\Log;

class OrderController extends BaseController{

    /**
     * 回调
     */
    public function callBack(){
        $data = input('param.');
        if(isset($data) && $data['trade_status']=='TRADE_SUCCESS'){

            Log::write("土豆支付异步通知====\r\n参数：".var_export($data,true)."\r\n");
            if (!$data) {
                echo 'failed';die;
            }
//            $order_no = $data['trade_no'];
            $out_order_no = $data['out_order_no'];
            $callback_order = model('UserRecharge')->where('order_number',$out_order_no)->find()->toArray();
//            var_dump($callback_order);exit;
            if(!empty($callback_order)){
                model('manage/UserRecharge')->rechargeDispose($callback_order);
            }
//            model('UserWithdrawals')->where('order_number',$out_order_no)->setField('state',1);
            echo 'success';die;
        }
        echo 'failed';die;
    }

	//创建订单接口
	//返回支付页面 paymentUrl
	//直接创建订单 跳转 页面提交入库
	public function createOrder(){
		$data = model('Order')->createOrder();
		return json($data);
	}

	//订单详细
	public function orderDetail(){

		$data = model('Order')->orderDetail();
		return json($data);

	}
	
	//订单列表
	public function orderList(){

		$data = model('Order')->orderList();
		return json($data);
		
	}
	
	//付息还本记录
	public function orderRecordList(){

		$data = model('Order')->orderRecordList();
		return json($data);
		
	}
	
	//合同
	public function hetong(){

		$data = model('Order')->hetong();
		return json($data);
		
	}
	
	//付息还本
	public function repayMent(){

		$data = model('Order')->repayMent();
		return json($data);
		
	}
	
}