<?php
    include "../db_conn.php";

    $pw = $_POST['pw'];
    $encrypted_passwd = hash('sha256', $pw);
    echo $pw . $encrypted_passwd. "<br>";
    $sql = "insert into regist values(null, '{$_POST['name']}', '{$_POST['id']}', '$encrypted_passwd', now())";
    $result = mysqli_query($db_conn, $sql);
    /* $result = $db_conn -> query($sql);*/
    // 입력이 됐으면 결과가 1이 나옴

    if($result === false){ /* === 이면 자료형까지 일치하는지 확인 */
        echo "저장에 문제가 생겼습니다. 관리자에게 문의 바랍니다.";
        echo mysqli_error($db_conn);
    } else{?>
    
        <script>
            alert("회원가입이 완료되었습니다.")
            location.href="../index.php"
        </script>;
    
    <?php
    }
    ?>