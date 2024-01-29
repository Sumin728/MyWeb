<?php
include "../db_conn.php";

$name = $_POST['name'];
$title = $_POST['title'];
$content = $_POST['content'];
$id = $_POST['id'];

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

$sql = "insert into board values(null,'$name', '$id', '$title', '$content', 0, now(), '$o_name')";
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
        <?php echo mysqli_error($db_conn); ?>
    </script>
<?php
}

mysqli_close($db_conn);
?>