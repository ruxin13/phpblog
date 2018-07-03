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

$mid = (int)$_REQUEST['mid'];

$tmp_sql = "select * from music where mid={$mid}";
$old = mysqli_fetch_assoc(mysqli_query($conn, $tmp_sql));

$fname = $_REQUEST['fname'];
$poster = $_REQUEST['poster'];
$ftype = $_REQUEST['ftype'];
$genre = $_REQUEST['genre'];
$author = $_REQUEST['author'];
$album = $_REQUEST['album'];
$duration = $_REQUEST['duration'];
$url = $_REQUEST['url'];

$update_sql = "UPDATE music SET poster='$poster',fname='$fname',ftype='$ftype',genre='$genre',author='$author',album='$album',duration='$duration',url='$url' WHERE mid={$mid}";

$result = mysqli_query($conn, $update_sql);

$ret = array();

if ($result) {
    $ret = array(
        'ret' => 1
    );
    header("location:list.html");
}

echo json_encode($ret);

mysqli_close($conn);