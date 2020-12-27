<?php
function asc_sort($params = array())
{
    if (!empty($params)) {
        $p = ksort($params);
        if ($p) {
            $str = '';
            foreach ($params as $k => $val) {
                if(!empty($val)){
                    $str .= $k . '=' . $val . '&';
                }
            }
            $strs = rtrim($str, '&');
            return $strs;
        }
    }
    return false;
}

/*$params = [
    'partner' => '674879077138817',
    'user_seller' => '167241',
    'out_order_no' => 'T2020122400001112',
    'subject' => '666',
    'total_fee' => 350,
    'body' => 'test_recharge',
    'notify_url' => 'http://m.vvhgv.com/api/order/callback',
    'return_url' => 'http://m.vvhgv.com/',

];*/
$params = [
    'partner' => '674879077138817',
    'user_seller' => '167241',
    'order_no' => 'T2020122400001112',
    'name' => 'test',
    'bank_no' => '2212443241222978',
    'money' => 350,
    'bank_code' => 'ICBC',
    'sign_type' => 'RSA-S',
    'api_version' => '1.1',
];

$prestr = asc_sort($params);
//echo $prestr.PHP_EOL;
$key = 'ZSkPhGJIIFQpek2B69aqdgj8MXCthdKm';
echo $prestr.$key.PHP_EOL;
$sign = md5($prestr.$key);
$params['sign'] = $sign;
$params['http_referer'] = urlencode("m.vvhgv.com");
$params['pay_type'] = 'kuaijie';

//$recharge_url = 'http://www.tudoupays.com//PayOrder/payorder';
$recharge_url = 'http://www.tudoupays.com/api/cash';



http_post($recharge_url,$params);

function http_post($url, $params)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//若给定url自动跳转到新的url,有了下面参数可自动获取新url内容：302跳转
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $content = curl_exec($ch);
//获取请求返回码，请求成功返回200
    $code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    $headers = curl_getinfo($ch);
    echo $content;
    /*if(is_array($headers)&& isset($headers['url'])){
        header('content-type:text/html;charset=uft-8');
        //重定向页面
        header('location:'.$headers['url']);
    }*/

}




