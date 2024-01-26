<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/index.css" />
    <title>메인페이지</title>
</head>

<body>
    <?php
    include "../db_conn.php";

    session_start();
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : "";
    // echo $name;
    if (!$name) {
        header("location:../member/login.php");
        exit;
    }
    $sql = "select * from board order by regdate desc";
    $result = mysqli_query($db_conn, $sql);
    $num = mysqli_num_rows($result);
    ?>

    <p style="font-size:30px; text-align:center"><a href="index.php"><b style="color: black;">게시판</b></a></p>
    <div style="text-align:center;">
        <b><?php echo $_SESSION['name'] ?></b>님, 환영합니다.
        <button class="btn" onclick="location.href='../mypage/mychange.php?user=<?= $_SESSION['id'] ?>'">내 정보</button>
        <button class="btn" onclick="location.href='../member/logout.php'">로그아웃</button>
    </div>

    <hr>
    <br>


    <div>
        <table align="center">
            <thead align="center">
                <tr>
                    <td class="htd" width="100" align="center">작성자</td>
                    <td class="htd" width="400" align="center">제목</td>
                    <td class="htd" width="50" align="center">조회수</td>
                    <td class="htd" width="200" align="center"></td>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td width="50" align="center"><?php echo $rows['writer']  ?></td>
                        <td width="400" align="center">
                            <a href="../board/read.php?idx=<?php echo $rows['idx'] ?>">
                                <?php echo $rows['title'] ?></a>
                        </td>
                        <td width="50" align="center"><?php echo $rows['views'] ?></td>
                        <td width="200" align="center"><?php echo $rows['regdate'] ?></td>
                    </tr>
                <?php
                };
                ?>
            </tbody>
        </table>
    </div>

    <div style="text-align:center;" class="write">
        <button type="button" onclick="location.href='../board/write.php';">글쓰기</button>
    </div>

    </div>
</body>

</html>