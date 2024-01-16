<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/board.css" />
    <script src="blank.js"></script>
    <title>게시글 수정</title>
</head>

<body>
    <?php
    session_start();
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : "";
    include "../db_conn.php";
    $number = $_GET['idx'];

    $sql = "select id, title, content, regdate, writer from board where idx = $number";
    $result = mysqli_query($db_conn, $sql);
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $content = $row['content'];

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
    } else { ?>
        <div id="board_wrap" class="wrap">
            <form method="post" action="modify_proc.php" onsubmit="return ch_blank()">
                <table style="padding-top:50px" align=center width=auto border=0 cellpadding=2>
                    <tr>
                        <td>
                            <p><b>게시글 수정</b></p>
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
                                    <td><input type="text" name="title" maxlength="30" id="title" value="<?= $title ?>"></td>
                                </tr>
                                <tr>
                                    <td>내용</td>
                                    <td><textarea name="content" id="content"><?= $content ?></textarea></td>
                                </tr>
                            </table>
                            <input type="hidden" name="idx" value="<?= $number ?>">
                            <p><input type="submit" value="수정" class="form_btn"></p>
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