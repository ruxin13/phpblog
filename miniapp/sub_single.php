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

$sql_max = "select max(sid) from subject";

$maxIdret = mysqli_fetch_assoc(mysqli_query($conn, $sql_max));

$maxId = (int)$maxIdret['max(sid)'];

$number = rand(1, $maxId);

$rand_sql = "select * from subject where sid={$number}";

$result = mysqli_query($conn, $rand_sql);

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
}


echo json_encode($ret);

mysqli_close($conn);



