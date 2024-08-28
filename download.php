<!DOCTYPE html>
<html lang="ko">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport", initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <link href="style.css" rel="stylesheet">
  <link href="font.css" rel="stylesheet" type="text/css">
  <title>학교안내</title>
</head>
<body>
    <div class="bck">
    <div class="pic">
        <a href="index.php"><img src="images/ydklogo.jpg" class="logo"></a>
    </div>
    <h1 style="text-align:center"> </h1>
    <div class="getin">
        <?php
        if (isset($_SESSION['loggedin'])) { ?>
        <a href="logout.php" class="login">로그아웃</a>
        <?php }
        else { ?> 
        <a href="YDK-login.html" class="login">로그인</a>
        <a href="YDK-join.html" class="join">회원가입</a>
        <?php } ?>
    </div>
    <nav class="menu">   
        <ul class="dep1">
            <li><a href="board.php">게시판</a>
                <ul class="dep2">
                </ul>
            </li>
            <li><a href="#">내신계산기</a>
                <ul class="dep2">
                </ul>
            </li>
            <li><a href="#">책방</a>
                <ul class="dep2">
                    <li><a href="YDK-null.html">구매하기</a></li>
                    <li><a href="YDK-null.html">판매하기</a></li>
                </ul>
            </li>
            <li><a href="download.php">학교안내</a>
                <ul class="dep2">
                </ul>
            </li>
            <li><a href="food.php">오늘의급식</a>
                <ul class="dep2">
                </ul>
            </li>
            <li><a href="#">학사일정</a>
                <ul class="dep2">
                    <li><a href="YDK-null.html">1학년</a></li>
                    <li><a href="YDK-null.html">2학년</a></li>
                    <li><a href="YDK-null.html">3학년</a></li>
                </ul>
            </li>
        </ul>
  <div class="download">
  <a href="images/school.zip" download>학교 안내 프로그램 다운로드</a>
  </div>
      <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="footer">
                    <ul>
                        <li><a href="#">사이트 도움말</a></li>
                        <li><a href="#">사이트 이용약관</a></li>
                        <li><a href="#">사이트 운영원칙</a></li>
                        <li><a href="#"><strong>개인정보취급방침</strong></a></li>
                        <li><a href="#">게시중단요청서비스</a></li>
                        <li><a href="#">고객센터</a></li>
                        <li>연락처(<a href="" target="_blank">강현</a>,<a href="" target="_blank">구재민</a>)</li>
                    </ul>
                    <address>
                        Copyright ©
                        <strong>강현&구재민</strong>
                        All Rights Reserved.
                    </address>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>