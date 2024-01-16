<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style.css" />
    <title>회원가입</title>
  </head>

  <body>
  <div id="regist_wrap" class="wrap">
        <div>
            <h1>Join</h1>
            <form action="HashRegist_proc.php" method="post" name="regiform" id="regist_form" class="form" onsubmit="return sendit()">
                <p><input type="text" name="name" id="username" placeholder="Name"></p>
                <p><input type="text" name="id" id="userid" placeholder="ID">
                <input type="button" id="checkIdBtn" value="check" onclick="checkId()"></p>
                <p><input type="password" name="pw" id="userpw" placeholder="Password"></p>
                <p><input type="password" name="pw_ch" id="userpw_ch" placeholder="Password Check"></p>    
                <p><input type="submit" value="회원가입" id="join_button" class="form_btn"></p>
                <p class="pre_btn">Are you join? <a href="login.php">Login</a></p>
            </form>
        </div>
    </div>
  </body>
</html>
