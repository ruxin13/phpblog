<?php
/**
 * Created by PhpStorm.
 * User: lishu
 * Date: 2018/5/28
 * Time: 22:19
 */

include './conn.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_PORT);

if (mysqli_errno($conn)) {
    echo mysqli_error($conn);
    exit;
}

mysqli_select_db($conn, DB_NAME);

mysqli_set_charset($conn, DB_CHARSET);

$sql = "select * from user where openId='$_POST[openId]'";

$result = mysqli_fetch_assoc(mysqli_query($conn, $sql));

echo json_encode($result);

mysqli_close($conn);


