<?php
include "../db_conn.php";
session_start();
$id = $_SESSION['id'];

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$chpw = $_POST['newpw'];
$hashed_pw = hash('sha256', $chpw);
// $cur_pw = $_POST['pw'];
$cur_pw = hash('sha256', $_POST['pw']);

$sql = "select * from member where userid = '$id' and userpw = '$cur_pw'";
// echo $sql . "<br>";
$result = mysqli_query($db_conn, $sql);
$row = mysqli_fetch_array($result);

if ($row) {
    if (!$chpw) {
        $sql = "update member set username='$name', useremail='$email', userphone='$phone' where userid='$id'";
        // echo "$sql";
    } else {
        $sql = "update member set userpw='$hashed_pw', username='$name', useremail='$email', userphone='$phone' where userid='$id'";
        // echo "$sql";
    }
} else { ?><script>
        alert("현재 비밀번호가 일치하지 않습니다.");
        location.href = "../main/index.php";
    </script>
<?php
}
echo "<script>
    alert(\"정보가 수정되었습니다.\")
    location.href = \"../main/index.php\";
</script>";

$_SESSION['name'] = $name;
mysqli_query($db_conn, $sql);
mysqli_close($db_conn);
?>