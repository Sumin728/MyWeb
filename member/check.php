<?php
include "../db_conn.php";
$uid = $_GET["userid"];
$sql = "select * from member where userid = '$uid'";
$result = mysqli_query($db_conn, $sql);
$row = mysqli_fetch_array($result);

if (!$row) {
    echo $uid . "는 사용 가능한 아이디입니다.";
?><p><input type=button value="이 ID 사용" onclick="opener.parent.decide(); window.close();"></p>
<?php
} else {
    echo $uid . "는 중복된 아이디입니다.";
?><p><input type=button value="다른 ID 사용" onclick="opener.parent.change(); window.close()"></p>
<?php
}
?>