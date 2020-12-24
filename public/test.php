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

$params = [
    'partner' => '674879077138817',
    'user_seller' => '167241',
    'out_order_no' => 'T2020122400000012',
    'subject' => '666',
    'total_fee' => 500,
    'body' => 'iphone6s手机配件',
    'notify_url' => 'http://m.vvhgv.com/api/order/callback',
    'return_url' => 'http://m.vvhgv.com/',
//    'sign' => '61b0530211c1ab36fd93e9b3fdf09a5c',
//    'pay_type' => 'kuaijie',
//    'http_referer' => 'm.vvhgv.com',
    'banktype' => '',
];

$prestr = asc_sort($params);
echo $prestr.PHP_EOL;
$key = 'ZSkPhGJIIFQpek2B69aqdgj8MXCthdKm';
//echo $prestr.$key.PHP_EOL;
$sign = md5($prestr.$key);

$params['sign'] = $sign;
$params['pay_type'] = 'kuaijie';
$params['http_referer'] = 'm.vvhgv.com';
//echo $params['http_referer'].PHP_EOL;
echo $sign.PHP_EOL;

$recharge_url = 'http://www.tudoupays.com//PayOrder/payorder';


http_post($recharge_url,json_encode($params));

function http_post($url, $jsonStr)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//若给定url自动跳转到新的url,有了下面参数可自动获取新url内容：302跳转
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//设置cURL允许执行的最长秒数。
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0');
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    $content = curl_exec($ch);
//获取请求返回码，请求成功返回200
    $code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    $headers = curl_getinfo($ch);
    if(is_array($headers)&& isset($headers['url'])){
        header('content-type:text/html;charset=uft-8');
        //重定向页面
        header('location:'.$headers['url']);
    }

}




