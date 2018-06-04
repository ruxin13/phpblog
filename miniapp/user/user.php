<?php

include_once "wxBizDataCrypt.php";

$appid = 'wx5f137eeb2e39a17f';

$secret = '539d747c9b7954292bc7db67cd43d883';

$sessionKey = $_POST['sessionKey'];

$encryptedData = $_POST['encryptedData'];

$iv = $_POST['iv'];

$pc = new WXBizDataCrypt($appid, $sessionKey);
$errCode = $pc->decryptData($encryptedData, $iv, $data );

include '../conn.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_PORT);

if (mysqli_errno($conn)) {
    echo mysqli_error($conn);
    exit;
}

mysqli_select_db($conn, DB_NAME);

mysqli_set_charset($conn, DB_CHARSET);

$data = json_decode($data, true);

$ret_sel = mysqli_fetch_assoc(mysqli_query($conn,"select * from user where openId='$data[openId]'"));

if (!$ret_sel) {

    $sql_add = "INSERT INTO user(nickName,gender,country,province,city,openId,avatarUrl) VALUES('$data[nickName]','$data[gender]','$data[country]','$data[province]','$data[city]','$data[openId]','$data[avatarUrl]')";

    $ret = mysqli_query($conn, $sql_add);

    if ($errCode == 0) {
        print(json_encode($data));
    } else {
        print($errCode . "\n");
    }
} else {

    echo json_encode($ret_sel);
}





mysqli_close($conn);

