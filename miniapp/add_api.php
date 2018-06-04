<?php
/**
 * Created by PhpStorm.
 * User: lishu
 * Date: 2018/5/28
 * Time: 18:20
 */

include 'conn.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_PORT);

if (mysqli_errno($conn)) {
    echo mysqli_error($conn);
    exit;
}

mysqli_select_db($conn, 'dt');

mysqli_set_charset($conn, 'utf8');

$sql = "INSERT INTO subject(type,question,answer,answer1,answer2,answer3,answer4) VALUES('$_POST[type]', '$_POST[question]', '$_POST[answer]', '$_POST[answer1]', '$_POST[answer2]', '$_POST[answer3]', '$_POST[answer4]')";

$result = mysqli_query($conn, $sql);

if ($result) {
    $ret = array(
        'ret' => 1,
        'msg' => 'success'
    );
    header("location:add.html");
} else {
    $ret = array(
        'ret' => 0,
        'msg' => 'error'
    );
}

echo json_encode($ret);

mysqli_close($conn);
