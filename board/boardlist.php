<?php 
include "../db_conn.php"
?>

<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/BBS/css/style.css" />
</head>
<body>
<div id="board_area"> 
  <h1>자유게시판</h1>
  <h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">글쓴이</th>
                <th width="100">작성일</th>
                <!-- 추천수 항목 추가 -->
                <th width="100">추천수</th>
                <th width="100">조회수</th>
            </tr>
        </thead>
        
      <tbody>
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>
          <td width="500"><a href=""><?php echo $title;?></a></td>
          <td width="120"><?php echo $board['name']?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['hit']; ?></td>
          <!-- 추천수 표시해주기 위해 추가한 부분 -->
          <td width="100"><?php echo $board['thumbup']?></td>
        </tr>
      </tbody>

    </table>
    <div id="write_btn">
      <a href="wirte.php"><button>글쓰기</button></a>
    </div>
  </div>
</body>
</html>