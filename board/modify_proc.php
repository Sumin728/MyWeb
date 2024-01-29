<?php
include "../db_conn.php";

$title = $_POST['title'];
$content = $_POST['content'];
$number = $_POST['idx'];
//echo $number . "<br>";

$upError = $_FILES['uploadFile']['error'];
$tmpfile = $_FILES['uploadFile']['tmp_name'];
$o_name = $_FILES['uploadFile']['name'];
$filename = iconv("UTF-8", "EUC-KR", $_FILES['uploadFile']['name']);
$folder = "../upload/" . $filename;
move_uploaded_file($tmpfile, $folder);

if ($upError != UPLOAD_ERR_OK && $upError != 4) {
    switch ($upError) {
        case UPLOAD_ERR_INI_SIZE || UPLOAD_ERR_FORM_SIZE:
            echo "
				<script>
					alert(\"파일 사이즈가 초과되었습니다\");
					history.back();
				</script>
			";
            break;
        case UPLOAD_ERR_PARTIAL:
            echo "
				<script>
 					alert(\"파일이 제대로 업로드 되지 않았습니다\");
					history.back();
				</script>
			";
            break;
    }
    exit;
}

if (!$o_name) {
    $sql = "update board set title='$title', content='$content' where idx=$number";
} else {
    $sql = "update board set title='$title', content='$content', file='$o_name' where idx=$number";
}

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