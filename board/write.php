<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/board.css" />
    <script src="blank.js"></script>
    <title>게시글 작성</title>


</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['name'])) {
        echo "<script>
        alert(\"로그인이 필요합니다.\");
        location.href = \"../member/login.php\";
        </script>";
        exit;
    } else { ?>
        <div id="board_wrap" class="wrap">
            <form method="post" action="write_proc.php" enctype="multipart/form-data" onsubmit="return ch_blank()">
                <table padding-top:50px" align=center width=auto border=0 cellpadding=2>
                    <tr>
                        <td>
                            <p><b>게시글 작성</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="table2">
                                <tr>
                                    <td>작성자</td>
                                    <td><input type="hidden" name="name" value="<?= $_SESSION['name'] ?>"><?= $_SESSION['name'] ?></td>
                                </tr>
                                <tr>
                                    <td>제목</td>
                                    <td><input type="text" name="title" id="title" placeholder="제목" maxlength=25></td>
                                </tr>
                                <tr>
                                    <td>내용</td>
                                    <td><textarea name="content" id="content"></textarea></td>
                            </table>
                            <div>
                                <input type="file" style="margin-left: 60px;" name="uploadFile" accept="image/*, .pdf, .txt" />
                            </div>
                            <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                            <p><input type="submit" value="업로드" class="form_btn"></p>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
</body>

</html>
<?php
    }
?>