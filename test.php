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
$params['sign'] = $sign;



