<?php
    // 세션 실행
    session_start();

    // db 접속
    include "../db_conn.php";
    

    // 입력 받은 id와 passwd
    $id = $_POST['id'];
    $pw = $_POST['pw'];
    echo $id;

    //아이디가 있는지 검사
    $sql = "select * from regist where userid='$id'";
    $result = mysqli_query($db_conn, $sql);

    // 결과값 가져오기 (행 개수)
    $num = mysqli_num_rows($result);

    
    if(!$num){ // 아이디가 존재하지 않으면 로그인 페이지로 돌아가기 （식별）
        echo "<script> 
        alert(\"일치하는 아이디가 없습니다.\");
        history.back();
        </script>";
        exit;
    } else{ // 아이디가 존재하면 비밀번호 확인 （인증）
        $row = mysqli_fetch_array($result);
        if($row['userpw'] != $pw){ // 비밀번호 불일치 시 로그인 페이지로 돌아가기
            echo "<script>
                    alert(\"Incorrect Information.\");
                    history.back();
                </script>";
                exit;
        }else{ // 비밀번호 일치 시 세션 변수 생성
            $_SESSION['name'] = $row['username'];
            // echo $_SESSION['name'];
            mysqli_close($db_conn);

            header("Location: index.php");
            // echo "<script>
            //         location.href = \"index.php\";
            //         </script>";
        }

    }

    // $sql = "select * from regist where userid='$id'";
    // $result = mysqli_query($db_conn, $sql);
    // $row = mysqli_fetch_array($result);

    // $db_pass = $row['userpw'];
    // if($db_pass == $pw){
    //     echo "<script> 
    //     alert(\"환영합니다.\");
    //     </script>";
    //     exit;
    // }else{
    //     echo "<script> 
    //     alert(\"일치하는 아이디가 없습니다.\");
    //     history.back();
    //     </script>";
    //     exit;
    // }

    

?>