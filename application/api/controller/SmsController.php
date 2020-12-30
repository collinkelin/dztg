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
//     public function sendSMSCode(){
//         //return json_encode(['code'=>0,'code_dec'=>'通道接入中...']);
// 		/*$data = model('Sms')->sendSMSCode();
//     	return json($data);*/
//     }
    
    // CURL
public function https_request($url,$header=NULL,$data=null){
    $curl = curl_init();  
    curl_setopt($curl, CURLOPT_URL, $url);  
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);  
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
    $data = curl_exec($curl);  
    if (curl_errno($curl)) {return 'ERROR '.curl_error($curl);}  
    curl_close($curl);  
    return $data;
}
	public function computeSignature($parameters, $accessKeySecret)
	{
	    ksort($parameters);
	    $canonicalizedQueryString = '';
	    foreach($parameters as $key => $value)
	    {
			$canonicalizedQueryString .= '&' . $this->percentEncode($key). '=' . $this->percentEncode($value);
	    }	
	    $stringToSign = 'GET'.'&%2F&' . $this->percentencode(substr($canonicalizedQueryString, 1));
	    $signature = $this->signString($stringToSign, $accessKeySecret."&");

	    return $signature;
	}
	public function percentEncode($str)
	{
	    $res = urlencode($str);
	    $res = preg_replace('/\+/', '%20', $res);
	    $res = preg_replace('/\*/', '%2A', $res);
	    $res = preg_replace('/%7E/', '~', $res);
	    return $res;
	}
	
	public function signString($source, $accessSecret)
	{
		return	base64_encode(hash_hmac('sha256', $source, $accessSecret, true));
	}
	
	public function xml_to_json($source) {
        if(is_file($source)){ //传的是文件，还是xml的string的判断
        $xml_array=simplexml_load_file($source);
        }else{
        $xml_array=simplexml_load_string($source);
        }
        $json = json_encode($xml_array); //php5，以及以上，如果是更早版本，请查看JSON.php
        return $json;
    }
    //公用方法
    public function sendSMSCode(){
        return json_encode(['code'=>0]);
        /*$lang		= (input('post.lang')) ? input('post.lang') : 'ft';	// 语言类型
        $code = rand(100000,999999);
        $content = 'รหัสการตรวจสอบของคุณคือ'.$code;
        //$content = 'รหัสยืนยันของคุณคือ'.$code;
        $mobile = input('post.dest').input('post.phone');
    	$time = date("Y-m-d\TH:i:s\Z", time()-3600*8);
    	$apiParams["Message"] = $content;
    	$apiParams["AccessKeyId"] = 'LTAI4GH7shb9zZ5kTJaxfACF';
    	$apiParams["SignatureMethod"] = 'HMAC-SHA256';
    	$apiParams["SignatureVersion"] = '1.0';
        $apiParams["SignatureNonce"] = md5(time());
        $apiParams["Timestamp"] = $time;
        $apiParams["To"] = $mobile;
    	$apiParams["Action"] = 'SendMessageToGlobe';
    	$apiParams["Version"] = '2018-05-01';
    	$apiParams["Signature"] = $this->computeSignature($apiParams, 'HZ7D9wvjhEi9LptEZeDlkGaC9SPzEg');
    	$url = 'http://dysmsapi.ap-southeast-1.aliyuncs.com/?Action=SendMessageToGlobe&To='.$mobile.'&&Version=2018-05-01&SignatureNonce='.$apiParams["SignatureNonce"].'&SignatureVersion=1.0&AccessKeyId=LTAI4GH7shb9zZ5kTJaxfACF&Timestamp='.$time.'&SignatureMethod=HMAC-SHA256&Signature='.$apiParams["Signature"].'&Message='.$content;
        $resp =  $this->https_request($url);//GET请求，数据返回格式为error:xxx,success:xxx
    	$data = json_decode($this->xml_to_json($resp), true);
    	$str =  isset($data['ResponseCode'])?$data['ResponseCode']:'no';
    	if($str == 'OK'){
    	    cache('C_Code_'.$mobile, $code, 1800);
    	    return json_encode(['code'=>1,'code_dec'=>'ตรวจสอบรหัสส่งเรียบร้อยแล้ว']);
    	}else{
    	    return json_encode(['code'=>0,'code_dec'=>'การตรวจสอบรหัสล้มเหลวในการส่ง']);
    	}*/
    }

	
}
