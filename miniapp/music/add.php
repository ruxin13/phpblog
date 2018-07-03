<?php
/**
 * Created by PhpStorm.
 * User: lishu
 * Date: 2018/7/3
 * Time: 15:31
 */

include '../conn.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_PORT);

if (mysqli_errno($conn)) {
    echo mysqli_error($conn);
    exit;
}

mysqli_select_db($conn, DB_NAME);

mysqli_set_charset($conn, DB_CHARSET);

$sql = "INSERT INTO music(ftype,fname,author,poster,album,duration,genre,url) VALUES('$_POST[ftype]', '$_POST[fname]', '$_POST[author]', '$_POST[poster]', '$_POST[album]', '$_POST[duration]', '$_POST[genre]', '$_POST[url]')";

$result = mysqli_query($conn, $sql);

if ($result) {
    $ret = array(
        'ret' => 1,
        'msg' => 'success'
    );
    header("location:list.html");
} else {
    $ret = array(
        'ret' => 0,
        'msg' => 'error'
    );
}

echo json_encode($ret);

mysqli_close($conn);