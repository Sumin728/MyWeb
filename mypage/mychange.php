<?php
include "../db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<!-- https://www.cho-log.io/37 -->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <script type="text/javascript" src="./mychange.js"></script>
    <style>
        span {
            display: inline-block;
        }

        .idx {
            width: 80px;
            font-weight: bold;
        }

        .change_input {
            width: 280px;
        }
    </style>
    <title>마이페이지</title>
</head>

<body>
    <?php
    session_start();
    $id = $_GET['user'];
    $sql = "select * from member where userid = '$id'";
    $result = mysqli_query($db_conn, $sql);
    $row = mysqli_fetch_array($result);

    if ($id != $_SESSION['id']) {
        echo "<script>
       alert(\"권한이 없습니다.\");
       location.href = \"../main/index.php\";
       </script>";
    } else { ?>
        <div id="regist_wrap" class="wrap">
            <div>
                <h1>마이페이지</h1>
                <form action="mychange_proc.php" method="post" name="regiform" id="regist_form" class="form" onsubmit="return mycheck()">
                    <!-- value속성 값보다 태그에 입력 값을 우선순위로 갖는다.  -->
                    <p><span class="idx">이름</span><input class="change_input" style="width:320px;" type="text" name="name" id="username" value="<?php echo $row['username']; ?>"></p>
                    <p><span class="idx">ID</span><input class="change_input" style="width:320px;" type="text" name="id" id="userid" value=<?php echo $row['userid']; ?> disabled=true></p>
                    <p><span class="idx">Email</span><input style="width:320px;" type="text" name="email" id="useremail" value="<?php echo $row['useremail']; ?>">
                    </p>
                    <p><span class="idx">전화번호</span><input style="width:320px;" type="text" name="phone" id="userphone" value="<?php echo $row['userphone']; ?>"></p>
                    <p><span class="idx">비밀번호</span><input style="width:320px;" type="password" name="newpw" id="newpw" placeholder="변경할 비밀번호"></p>
                    <p><input type="password" name="pw" id="curpw" placeholder="현재 비밀번호"></p>
                    <p><input style="width:50px; height:42px; font-size:14px;" type="submit" value="수정" id="join_button" class="form_btn"></p>
                </form>
            </div>
        </div>
</body>

</html>
<?php
    }
?>