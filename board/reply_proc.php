<?php
include "../db_conn.php";

$num = $_GET['idx'];
$id = $_POST['id'];
$name = $_POST['name'];
$content = $_POST['content'];

$sql = "insert into reply values(null,'$num', '$name', '$id', '$content', now())";
$result = mysqli_query($db_conn, $sql);

if ($result) {
    echo "<script>alert('댓글이 작성되었습니다.');
    location.href='read.php?idx=$num';</script>";
} else {
    echo "<script>alert('댓글 작성에 실패했습니다.');
    history.back();</script>";
}

mysqli_close($db_conn);
