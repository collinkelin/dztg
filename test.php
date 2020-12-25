<?php
/*function asc_sort($params = array())
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
    'out_order_no' => 'T2020122400000001',
    'subject' => '购买',
    'total_fee' => 3,
    'body' => 'iphone6s手机配件',
    'notify_url' => 'http://m.vvhgv.com/api/order/callback',
    'return_url' => 'http://m.vvhgv.com/',
    'sign' => 'aca37cdb9bf672e2c3f36f2fbfd5bd73',
    'pay_type' => 'kuaijie',
    'http_referer' => 'm.vvhgv.com',
    'banktype' => '',
];

$prestr = asc_sort($params);
$key = 'ZSkPhGJIIFQpek2B69aqdgj8MXCthdKm';
$sign = md5($prestr.$key);
echo $sign.PHP_EOL;

$recharge_url = 'http://www.tudoupays.com//PayOrder/payorder';
$params['sign'] = $sign;*/

$url = 'http://156.230.4.244:6665/sms/sendByJson';



// Setup request to send json via POST
$data = array(
    'apiKey' => '7c09d4d076754f02aa797b79b4261b5c',
    'mobile' => '009118516038423',
    'content' => 'Your code is 123456"',
);

$pre_json_str = json_encode( $data);
$ch = curl_init($url);
// Attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $pre_json_str);
// Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
// Return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Execute the POST request
$result = curl_exec($ch);
// Close cURL resource
curl_close($ch);

var_dump($result);


