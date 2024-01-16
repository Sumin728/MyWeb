<?php
// session_start();
include "../db_conn.php";

$name = $_POST['name'];
$title = $_POST['title'];
$content = $_POST['content'];
$id = $_POST['id'];

$sql = "insert into board values(null,'$name', '$id', '$title', '$content', 0, now())";
$result = mysqli_query($db_conn, $sql);

if ($result) { ?>
    <script>
        alert("게시글이 등록되었습니다.");
        location.href = "../main/index.php";
    </script>
<?php
} else { ?>
    <script>
        alert("게시글 등록 실패")
    </script>
<?php
}

mysqli_close($db_conn);
?>