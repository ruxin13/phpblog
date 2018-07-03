<?php
/**
 * Created by PhpStorm.
 * User: lishu
 * Date: 2018/7/3
 * Time: 10:32
 */

include '../conn.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_PORT);

if (mysqli_errno($conn)) {
    echo mysqli_error($conn);
    exit;
}

mysqli_select_db($conn, DB_NAME);

mysqli_set_charset($conn, DB_CHARSET);

$mid = $_REQUEST['mid'];

$single_sql = "select * from music where mid={$mid}";

$result = mysqli_query($conn, $single_sql);

$list = array();

$ret = array();

if ($result && mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $ret = array(
            'data' => $row,
            'ret' => 1
        );
    }
} else {
    $ret = array(
        'ret' => 0,
        'data' => null,
        'msg' => "mid not exist!"
    );
}

echo json_encode($ret);

mysqli_close($conn);