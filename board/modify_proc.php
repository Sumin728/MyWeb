<?php
include "../db_conn.php";

$title = $_POST['title'];
$content = $_POST['content'];
$number = $_POST['idx'];
echo $number . "<br>";

$sql = "update board set title='$title', content='$content' where idx=$number";
$result = mysqli_query($db_conn, $sql);
$row = mysqli_fetch_array($result);
echo $row;

if ($result) { ?>
    <script>
        alert("게시글이 수정되었습니다.");
        location.href = "../main/index.php";
    </script>
<?php
} else {
    echo "게시글 수정에 실패하였습니다.";
}

mysqli_close($db_conn);
?>