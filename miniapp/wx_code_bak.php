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

// array_push($result, $data[openid]);
$result['openId'] = $data[openid];

echo json_encode($result);

///////////////////////////////

function curl_get_https($url){
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);  // 从证书中检查SSL加密算法是否存在
    $tmpInfo = curl_exec($curl);     //返回api的json对象
    //关闭URL请求
    curl_close($curl);
    return $tmpInfo;    //返回json对象
}

//echo $url;

