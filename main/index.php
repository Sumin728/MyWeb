<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/index.css" />
  <script>
    function info() {
      var opt = document.getElementById("search_opt");
      var opt_val = opt.options[opt.selectedIndex].value;
      var info = ""
      if (opt_val == 'title') {
        info = "제목을 입력하세요.";
      } else if (opt_val == 'content') {
        info = "내용을 입력하세요.";
      } else if (opt_val == 'writer') {
        info = "작성자를 입력하세요.";
      }
      document.getElementById("search_box").placeholder = info;
    }
  </script>

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

  $sql = "select * from board";
  $result = mysqli_query($db_conn, $sql);
  $num = mysqli_num_rows($result);

  /* paging : 한 페이지 당 데이터 개수 */
  $list_num = 10;

  /* paging : 한 블럭 당 페이지 수 */
  $page_num = 5;

  /* paging : 현재 페이지 */
  $page = isset($_GET["page"]) ? $_GET["page"] : 1;

  /* paging : 전체 페이지 수 = 전체 데이터 / 페이지당 데이터 개수, ceil : 올림값, floor : 내림값, round : 반올림 */
  $total_page = ceil($num / $list_num);
  // echo "전체 페이지 수 : ".$total_page;

  /* paging : 전체 블럭 수 = 전체 페이지 수 / 블럭 당 페이지 수 */
  $total_block = ceil($total_page / $page_num);

  /* paging : 현재 블럭 번호 = 현재 페이지 번호 / 블럭 당 페이지 수 */
  $now_block = ceil($page / $page_num);

  /* paging : 블럭 당 시작 페이지 번호 = (해당 글의 블럭번호 - 1) * 블럭당 페이지 수 + 1 */
  $s_pageNum = ($now_block - 1) * $page_num + 1;
  // 데이터가 0개인 경우
  if ($s_pageNum <= 0) {
    $s_pageNum = 1;
  };

  /* paging : 블럭 당 마지막 페이지 번호 = 현재 블럭 번호 * 블럭 당 페이지 수 */
  $e_pageNum = $now_block * $page_num;
  // 마지막 번호가 전체 페이지 수를 넘지 않도록
  if ($e_pageNum > $total_page) {
    $e_pageNum = $total_page;
  };

  // ~~ limit으로 변수 출력하기 ~~
  /* paging : 시작 번호 = (현재 페이지 번호 - 1) * 페이지 당 보여질 데이터 수 */
  $start = ($page - 1) * $list_num;

  /* paging : 쿼리 작성 - limit 몇번부터, 몇개 */
  $sql = "select * from board order by regdate DESC limit $start, $list_num;";
  // echo $sql."<br>";
  /* paging : 쿼리 전송 */
  $result = mysqli_query($db_conn, $sql);
  $total = mysqli_num_rows($result);
  ?>

  <p style="font-size:35px; text-align:center"><a href="index.php"><b style="color: black;">게시판</b></a></p>
  <div style="text-align:right;">
    <b><?php echo $_SESSION['name'] ?></b>님, 환영합니다.
    <button class="btn" onclick="location.href='../mypage/mychange.php?user=<?= $_SESSION['id'] ?>'">내 정보</button>
    <button class="btn" onclick="location.href='../member/logout.php'">로그아웃</button>
  </div>
  <hr>
  <br>

  <div class="column">
    <div class="search">
      <form method="get" action="search.php">
        <select style="width:65px;" name="cate" id="search_opt" onchange="info()">
          <option value=title>제목</option>
          <option value=content>내용</option>
          <option value=writer>작성자</option>
        </select>
        <input class=textform type=text name=search id="search_box" autocomplete="off" placeholder="제목을 입력하세요." required>
        <input class=submit type=submit value=검색>
        <input class=date type=date name=date1>
        ~
        <input class=date type=date name=date2>
      </form>
    </div>

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
                  <?php echo htmlentities($rows['title']) ?></a>
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

    <div class="paging">
      <p class="pager">
        <a href="index.php?page=1">&lt&lt</a>
        <?php
        /* paging : 이전 페이지 */
        if ($page <= 1) {
        ?>
          <a href="index.php?page=1">이전</a>
        <?php } else { ?>
          <a href="index.php?page=<?php echo ($page - 1); ?>">이전</a>
        <?php }; ?>

        <?php
        /* pager : 페이지 번호 출력 */
        for ($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++) {
        ?>
          <a href="index.php?page=<?php echo $print_page; ?>"><?php echo $print_page; ?></a>
        <?php }; ?>

        <?php
        /* paging : 다음 페이지 */
        if ($page >= $total_page) {
        ?>
          <a href="index.php?page=<?php echo $total_page; ?>">다음</a>
        <?php } else { ?>
          <a href="index.php?page=<?php echo ($page + 1); ?>">다음</a>
        <?php }; ?>
        <a href="index.php?page=<?php echo $total_page; ?>">&gt&gt</a>
      </p>
    </div>
  </div>
</body>

</html>