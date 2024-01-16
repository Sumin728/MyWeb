<?php
    session_start();

    // db 접속
    include "../db_conn.php";

    // 입력 받은 id, pw
    $id = $_POST['id'];
    $pw = $_POST['pw'];

    //식별과 인증 동시
    $sql = "select * from regist where userid='$id' and userpw='$pw'";
    $result = mysqli_query($db_conn, $sql);
    $row = mysqli_fetch_array($result);

    if($row){
        $_SESSION['name'] = $row['username'];
        mysqli_close($db_conn);
        header("Location: ../index.php");
    }else{
        echo "<script>
            alert(\"Incorrect Information.\");
            history.back();
            </script>";
             exit;
    }
?>