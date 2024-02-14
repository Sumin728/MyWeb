<?php
$db_server = 'localhost';
$db_username = 'admin';
$db_password = 'student1234';
$db_name = 'Board';

// db 연결
$db_conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);
$db_conn->set_charset("utf8"); // 한글 깨짐 해결
