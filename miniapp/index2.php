<?php
/**
 * Created by PhpStorm.
 * User: lishu
 * Date: 2018/5/28
 * Time: 15:45
 * 查询题目列表--小程序答题用--一次查询一道题
 */

include 'conn.php';

// 返回的条数
$len = 12;

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_PORT);

if (mysqli_errno($conn)) {
    mysqli_errno($conn);
    exit;
}

mysqli_set_charset($conn, DB_CHARSET);

$sql_max = "select max(sid) from subject";

$sql_total = "select count(*) from subject";

$count = (int)mysqli_fetch_assoc(mysqli_query($conn, $sql_total))['count(*)'];

$maxIdret = mysqli_fetch_assoc(mysqli_query($conn, $sql_max));

$maxId = (int)$maxIdret['max(sid)'];

$numbers = range(1, $maxId);

shuffle($numbers);

$ids = array_slice($numbers, 0, $len);

$ids_str = '';

for ($i=0;$i<count($ids);$i++) {
    $ids_str = $ids_str . 'sid=' . $ids[$i] . ' or ';
}

$ids_str_sql = substr($ids_str,0,strlen($ids_str)-4);

$count_sql = "select * from subject where $ids_str_sql";

$result = mysqli_query($conn, $count_sql);

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
    $ret = array(
        'data' => $list,
        'ret' => 1,
        'total' => count($list)
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

