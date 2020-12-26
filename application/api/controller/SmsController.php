<?php
namespace app\api\controller;

use think\Controller;
use think\Cache;
//use app\common\model\SmsModel as Sms;

class SmsController extends Controller{
	//初始化方法
	protected function initialize(){		
	 	parent::initialize();		
		header('Access-Control-Allow-Origin:*');
		header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId");
    }

	//国家区号
	public function smsCode(){
	    $lang		= (input('post.lang')) ? input('post.lang') : 'id';	// 语言类型

        $setting = model('Setting')->field('cn,ty,en,es')->where('id','>',0)->find();
        $data = [
//            1=>['id'=>'66','name'=>'THAILAND(泰国)'],
//            2=>['id'=>'1','name'=>'USA(美国)'],
//            3=>['id'=>'86','name'=>'CHINA(中国)'],
        ];

        ($setting['ty']==1) &&  array_push($data,['id'=>'66','name'=>'THAILAND(泰国)']);
        ($setting['en']==1) &&  array_push($data,['id'=>'1','name'=>'USA(美国)']);
        ($setting['cn']==1) &&  array_push($data,['id'=>'86','name'=>'CHINA(中国)']);

        /*$data	=	array(
            array('id'=>'66','name'=>'THAILAND(泰国)'),
            array('id'=>'1','name'=>'USA(美国)'),
            array('id'=>'62','name'=>'INDOESIA(印度尼西亚)'),
            array('id'=>'86','name'=>'CHINA(中国)'),
            array('id'=>'84','name'=>'VIETNAM(越南)'),
            array('id'=>'34','name'=>'España(西班牙)'),
            array('id'=>'81','name'=>'JAPAN(日本)'),
        );*/
        return json($data);
	}
	
    /**
     * 发送短信验证码（POST形式）
     * @return [type] [description]
    */
    public function sendSMSCode(){
		$data = model('Sms')->sendSMSCode();
    	return json($data);
    }

	
}
