<?php
                $connect = mysqli_connect("localhost","","","") or die("fail");
                $query ="select * from board order by number desc";
                $result = $connect->query($query);
                $total = mysqli_num_rows($result);

                session_start();
?>


<!DOCTYPE html>
<html lang="ko">    
<head>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8027810920130280"
     crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport", initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>영덕익명커뮤니티</title>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="font.css" rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(function(){
            $('.mainslide').slick();
        });
    </script>
</head>
<body>
    <div class="bck">
    <div class="pic">
        <a href="#"><img src="images/ydklogo.jpg" class="logo"></a>
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
        <section class="mainslide">
            <div><img src="images/env1.jpg"></div>
            <div><img src="images/env2.jpg"></div>
            <div><img src="images/env3.jpg"></div>
        </section>
    </nav>
    </div>
    <div class="blackbox">
        <h1>공간분할1</h1>
    </div>
    <div class="scroll">
		<h1>스크롤 반응형</h1>
		<p>영덕고등학교익명커뮤니티는.. 뭐시기~~ 소개글</p>
		<div class="item1" data-aos="fade-right">1</div>
        <div class="item2" data-aos="fade-left">2</div>
        <div class="item1" data-aos="fade-right">3</div>
        <div class="item2" data-aos="fade-left">4</div>
        <div class="item1" data-aos="fade-right">5</div>
        <div class="codepen">
		<span class="c1">영덕</span>
		<span class="c2">익</span>
		<span class="c3">명</span>
		<span class="c4">커</span>
		<span class="c5">뮤</span>
		<span class="c6">니</span>
		<span class="c7">티</span>
		<span class="c8"></span></div>
			<div class="gostart" data-aos="zoom-in"><a href="board.php">게시판 둘러보기</a>
		</div>
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
                        <li>연락처(<a href="https://www.instagram.com/hyeonn_25/" target="_blank">강현</a>,<a href="https://www.instagram.com/ku_jaemin/" target="_blank">구재민</a>)</li>
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
    <script>
   function simpleParallax() {
    var scrolled = $(window).scrollTop() + 1;
    
    $('.scroll').css('background-position', '0' + -(scrolled * 0.2) + 'px');
}
$(window).scroll(function (e) {
    simpleParallax();
});
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init({
        duration: 1200,
        delay: 130,
        easing: 'ease-in-out-quad',
    })
    </script>
</body>
</html>