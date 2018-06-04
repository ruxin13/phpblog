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

$count_sql = 'select * from subject';

$result = mysqli_query($conn, $count_sql);

// 记录总条数
//$count = mysqli_num_rows($result);

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
    shuffle($list);
    $list_put = array_slice($list, 0, 12);
    $ret = array(
        'data' => $list_put,
        'ret' => 1,
        'total' => count($list_put)
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

