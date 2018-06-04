<?php
/**
 * Created by PhpStorm.
 * User: lishu
 * Date: 2018/5/28
 * Time: 22:19
 */

$appid = 'wx5f137eeb2e39a17f';
$secret = '539d747c9b7954292bc7db67cd43d883';
$code = $_POST['code'];

$url = "https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code";

// echo curl_get_https($url);
///////////////////////////////
$ret = curl_get_https($url);

include './conn.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_PORT);

if (mysqli_errno($conn)) {
    echo mysqli_error($conn);
    exit;
}

mysqli_select_db($conn, DB_NAME);

mysqli_set_charset($conn, DB_CHARSET);

$data = json_decode($ret, true);

$sql = "select * from user where openId='$data[openid]'";

$result = mysqli_fetch_assoc(mysqli_query($conn, $sql));

$result['openId'] = $data[openid];
$result['session_key'] = $data[session_key];

echo json_encode($result);


function curl_get_https($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
    $tmpInfo = curl_exec($curl);     
    curl_close($curl);
    return $tmpInfo;
}

mysqli_close($conn);
