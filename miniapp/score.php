<?php
/**
 * Created by PhpStorm.
 * User: lishu
 * Date: 2018/5/29
 * Time: 17:18
 */


include 'conn.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_PORT);

if (mysqli_errno($conn)) {
    echo mysqli_error($conn);
    exit;
}

mysqli_select_db($conn, DB_NAME);

mysqli_set_charset($conn, DB_CHARSET);

$sql = "UPDATE user SET score=score+'$_POST[score]' WHERE openId='$_POST[openId]'";

$result = mysqli_query($conn, $sql);

if ($result) {
    $ret = array(
        'ret' => 1,
        'msg' => 'success'
    );
} else {
    $ret = array(
        'ret' => 0,
        'msg' => 'error'
    );
}

echo json_encode($ret);

mysqli_close($conn);