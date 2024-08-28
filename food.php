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
    <title>오늘의 급식</title>
    <link href="food.css" rel="stylesheet">
    <link href="font.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="bck">
        <div class="pic">
            <a href="index.php"><img src="images/ydklogo.jpg" class="logo"></a>
        </div>
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
                <li><a href="/board.php">게시판</a>
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
    <h1 class="title"><strong><오늘의 급식></strong></h1>

    <div class="info">
        <p></p>
    </div>
    <div class="alg">
        <small>1.난류, 2.우유, 3.메밀, 4.땅콩, 5.대두, 6.밀, 7.고등어, 8.게, 9.새우, 10.돼지고기, 11.복숭아, 12.토마토, 13.아황산염, 14.호두, 15.닭고기, 16.쇠고기, 17.오징어, 18.전복, 19.홍합
        </small>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>        
        let today = new Date();

        let year = today.getFullYear();
        let month = ('0' + (today.getMonth() + 1)).slice(-2);
        let day = ('0' + today.getDate()).slice(-2);
        let dateString = year + month + day;

        console.log(dateString);
        $.ajax({
            method: "GET",
            url: "https://open.neis.go.kr/hub/mealServiceDietInfo",
            data: {
                KEY: "da39e11836ab4c3e9c5f9cf87a9e25fe", Type: "json", ATPT_OFCDC_SC_CODE: "J10", SD_SCHUL_CODE: "7530101",
                MLSV_YMD: dateString
            }
        })
            .done(function (msg) {
                let obj = JSON.parse(msg);
                console.log(obj.mealServiceDietInfo[1].row[0].DDISH_NM);
                $("p").append("<strong>" + obj.mealServiceDietInfo[1].row[0].DDISH_NM + "</strong>");
            });
    </script>
</body>
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
</html>