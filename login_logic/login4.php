<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style.css" />
    <title>로그인</title>

    <!-- 개발자 영역에 노출되므로 따로 js 파일로 작성 -->
    <script type="text/javascript">
      function login_check(){
        var userid = document.getElementById("id");
        var userpw = document.getElementById("pw"); 

        if(userid.value == ""){
          var err_txt = document.querySelector(".err_id");
          err_txt.textContent = "아이디를 입력하세요.";
          //alert("아이디를 입력하세요.");
          // userid.focus();
          return false;
        };

        if(userpw.value ==""){
          var err_txt = document.querySelector(".err_pw");
          err_txt.textContent = "비밀번호를 입력하세요.";
          //alert("비밀번호를 입력하세요.");
          // userpw.focus();
          return false;
        };
      };
      </script>
    
  </head>

  <body>
    <div id="login_wrap" class="wrap">
        <div>
            <h1>Login</h1>
            <form action="login_proc4.php" method="post" name="loginform" id="login_form" class="form" onsubmit="return login_check()">
                <p><input type="text" name="id" id="id" placeholder="ID"></p>
                <span class="err_id"></span>
                <p><input type="password" name="pw" id="pw" placeholder="Password"></p>
                <span class="err_pw"></span>
                <p><input type="submit" value="로그인" class="form_btn"></p>
                <!-- <p class="pre_btn">Are you join? <a href="login.php">Login</a></p> -->
                <p class="pre_btn"><a href="regist.php">회원가입</a></p>
            </form>
        </div>
    </div>

  </body>
</html>