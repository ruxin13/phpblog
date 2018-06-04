<?php
/**
 * Created by PhpStorm.
 * User: lishu
 * Date: 2018/5/28
 * Time: 15:45
 */

include 'conn.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_PORT);

if (mysqli_errno($conn)) {
    mysqli_errno($conn);
    exit;
}

mysqli_set_charset($conn, DB_CHARSET);

$currentPage = $_REQUEST['currentPage'];

$pageSize = $_REQUEST['pageSize'];

$currentIndex = ($currentPage - 1) * $pageSize;

$count_sql = "SELECT * FROM subject limit $currentIndex,$pageSize";
$all_sql = "SELECT * FROM subject";

$result = mysqli_query($conn, $count_sql);

// 记录总条数
$count = mysqli_num_rows(mysqli_query($conn, $all_sql));

// 显示结果的数组
$list = array();

$ret = array();

if ($result && mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {

        $row['answer'] = (int)$row['answer'];
        $row['type'] = (int)$row['type'];
        $row['answers'] = array();
        for ($i = 1; $i <= 4; $i++) {
            if ($row["answer{$i}"]) {
                array_push($row['answers'], array('answer' => $row["answer{$i}"], 'id' => $i));
            }
            unset($row["answer{$i}"]);
        }
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

