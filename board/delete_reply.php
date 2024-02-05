<?php
session_start();
$name = isset($_SESSION['name']) ? $_SESSION['name'] : "";
include "../db_conn.php";

$con_num = $_GET['con'];
$idx = $_GET['idx'];
$sql = "select id from reply where idx = $idx";
$result = mysqli_query($db_conn, $sql);
$row = mysqli_fetch_array($result);

if (!$name) {
    echo "<script>
   alert(\"로그인이 필요합니다.\");
   location.href = \"../member/login.php\";
   </script>";
    exit;
} else if ($_SESSION['id'] != $row['id']) {
    echo "<script>
    alert(\"권한이 없습니다.\");
    history.back();
    </script>";
    exit;
} else {
    $sql2 = "delete from reply where idx = $idx";
    $result2 = mysqli_query($db_conn, $sql2);
    // echo "<script> alert(\"삭제되었습니다.\");</script>";
    header("Location: read2.php?idx=$con_num");
}
mysqli_close($db_conn);
