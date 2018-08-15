<?php
/**
 * Created by PhpStorm.
 * User: lishu
 * Date: 2018/7/3
 * Time: 10:19
 */

include '../conn.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_PORT);

if (mysqli_errno($conn)) {
    mysqli_errno($conn);
    exit;
}

mysqli_set_charset($conn, DB_CHARSET);

$currentPage = $_REQUEST['currentPage'];

$pageSize = $_REQUEST['pageSize'];

if (!$currentPage) {$currentPage = 1;}

if (!$pageSize) {$pageSize = 100;}

$currentIndex = ($currentPage - 1) * $pageSize;

$count_sql = "SELECT * FROM shijiemingqu ORDER BY mid DESC limit $currentIndex,$pageSize";
$all_sql = "SELECT * FROM shijiemingqu";

$result = mysqli_query($conn, $count_sql);

// 记录总条数
$count = mysqli_num_rows(mysqli_query($conn, $all_sql));

// 显示结果的数组
$list = array();

$ret = array();

if ($result && mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {

        array_push($list, $row);
    }

    $ret = array(
        'data' => $list,
        'ret' => 1,
        'total' => $count,
    );
} else {
    $ret = array(
        'data' => null,
        'ret' => 0,
        'total' => 0
    );
}

echo json_encode($ret);

mysqli_close($conn);