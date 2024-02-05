<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/board_read.css" />
    <title>게시글 읽기</title>
    <style>
        .line {
            border: solid 1px black;
        }
    </style>
</head>

<body>
    <?php
    include "../db_conn.php";
    session_start();
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : "";
    if (!$name) {
        header("location:../member/login.php");
        exit;
    }
    $number = $_GET['idx'];
    $view_sql = "update board set views = views+1 where idx = '$number'";
    mysqli_query($db_conn, $view_sql);
    $sql = "select title, content, writer, id, regdate, views, file from board where idx = $number";
    $result = mysqli_query($db_conn, $sql);
    $row = mysqli_fetch_array($result);
    ?>
    <p style="font-size:35px;"><a href="../main/index.php"><b style="color: black;">게시판</b></a></p>
    <div style="text-align:right;">
        <b><?php echo $_SESSION['name'] ?></b>님, 환영합니다.
        <button class="btn" onclick="location.href='../mypage/mychange.php?user=<?= $_SESSION['id'] ?>'">내 정보</button>
        <button class="btn" onclick="location.href='../member/logout.php'">로그아웃</button>
    </div>
    <hr>
    <br>
    <!--- 컨텐츠 -->
    <div id="read" style="margin-top:30px;">
        <div id="title">
            <p style="font-size:27px;"><b><?php echo $row['title']; ?></b></p>
        </div>
        <div id="info">
            <?php echo $row['writer'] . "(" . $row['id'] . ") " . ", " . $row['regdate'] . " , 조회수 : " . $row['views']; ?>
        </div>
        <hr class="line">
        <br>

        <div id="content">
            <p style="font-size: 18px;"><?php echo nl2br($row['content']) ?></p>
        </div>
        <?php if ($row['file'] != NULL) { ?>
            <div id="file">
                파일 : <a style="font-size:17px;" href="../upload/<?php echo $row['file']; ?>" download><?php echo $row['file']; ?></a>
            </div>
        <?php }; ?>
        <div>
            <button class="read_btn" onclick="location.href='../main/index.php'">목록</button>
            <?php
            session_start();
            if ($_SESSION['id'] == $row['id']) { ?>
                <button class="read_btn" onclick="location.href='modify.php?idx=<?= $number ?>'">수정</button>
                <button class="read_btn" onclick="location.href='delete.php?idx=<?= $number ?>'">삭제</button>
            <?php } ?>
        </div>
    </div>
    <hr class="line">
    <br>

    <!--- 댓글 입력 폼 -->
    <div id="reply" style="margin-bottom: 50px;">
        <p style="font-size:18px; font-weight:bold;">댓글</p>

        <?php
        $sql = "select * from reply where con_num=$number";
        $result = mysqli_query($db_conn, $sql);

        while ($rows = mysqli_fetch_assoc($result)) {
        ?>
            <div class="dap_lo" style="border-radius:10px; margin:auto; text-align:left; padding-left:10px; border: solid 1px gray; margin-bottom: 10px; padding-bottom:10px; width:700px;">
                <div style="margin-bottom:5px; margin-top:5px;"><b><?php echo $rows['name']; ?></b></div>
                <div class="dap_to comt_edit" style="font-size:18px;"><?php echo nl2br("$rows[content]"); ?></div>
                <div class="rep_me dap_to" style="padding-bottom: 3px; font-size:13px;"><?php echo $rows['regdate']; ?></div>
                <?php if ($_SESSION['id'] == $rows['id']) { ?>
                    <a style="color:gray" href="delete_reply.php?con=<?php echo $number ?>&idx=<?php echo $rows['idx'] ?>">삭제</a>
                <?php }; ?>
            </div>
        <?php }; ?>
        <br>
        <form action="reply_proc.php?idx=<?php echo $number; ?>" method="post">
            <textarea name="content" class="reply_content" style="width:500px; height:100px;"></textarea>
            <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
            <input type="hidden" name="name" value="<?= $_SESSION['name'] ?>">
            <br>
            <button type="submit" class="read_btn">작성</button>
        </form>
    </div>
</body>

</html>