<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/board_read.css" />
    <title>게시글 읽기</title>
</head>

<body>
    <?php
    include "../db_conn.php";
    $number = $_GET['idx'];

    $view_sql = "update board set views = views+1 where idx = '$number'";
    mysqli_query($db_conn, $view_sql);
    $sql = "select title, content, regdate, writer, id from board where idx = $number";
    $result = mysqli_query($db_conn, $sql);
    $row = mysqli_fetch_array($result);
    ?>
    <div id="board_wrap" class="wrap">
        <table style="padding-top:50px" align=center width=auto border=0 cellpadding=2>
            <tr>
                <td>
                    <p><b><?php echo $row['title'] ?></b></p>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="table2">
                        <tr>
                            <td class="writer">작성자</td>
                            <td class="writer2"><input type="hidden" name="name"><?php echo $row['writer'] . " (" . $row['id'] . ")" ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="content"><?= nl2br($row['content']) ?></td>
                        </tr>
                    </table>
                    <div class="read_btn">
                        <button class="btn" onclick="location.href='../main/index.php'">목록</button>
                        <button class="btn" onclick="location.href='modify.php?idx=<?= $number ?>'">수정</button>
                        <button class="btn" onclick="location.href='delete.php?idx=<?= $number ?>'">삭제</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>