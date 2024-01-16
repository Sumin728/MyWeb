<?php
session_start();
$name = isset($_SESSION['name']) ? $_SESSION['name'] : "";
include "../db_conn.php";

$number = $_GET['idx'];
$sql = "select id from board where idx = $number";
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
   $sql2 = "delete from board where idx = $number";
   $result2 = mysqli_query($db_conn, $sql2);
   // echo "<script> alert(\"삭제되었습니다.\");</script>";
   header("Location: ../main/index.php");
}
mysqli_close($db_conn);
