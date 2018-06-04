<?php

include_once "wxBizDataCrypt.php";


$appid = 'wx5f137eeb2e39a17f';

$secret = '539d747c9b7954292bc7db67cd43d883';

$sessionKey = $_POST['sessionKey'];

$encryptedData = $_POST['encryptedData'];

$iv = $_POST['iv'];

$pc = new WXBizDataCrypt($appid, $sessionKey);
$errCode = $pc->decryptData($encryptedData, $iv, $data );

if ($errCode == 0) {
    print($data . "\n");
} else {
    print($errCode . "\n");
}
