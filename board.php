<?php
session_start();
                $connect = mysqli_connect("localhost","","","") or die("fail");
                $query ="select * from board order by number desc";
                $result = $connect->query($query);
                $total = mysqli_num_rows($result);
                $myname = $_SESSION['name'];
                
?>


<!DOCTYPE html>
 
<html>
<head>
        <meta charset = 'utf-8'>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8027810920130280"
     crossorigin="anonymous"></script>
        <link href="style.css" rel="stylesheet">
        <link href="font.css" rel="stylesheet" type="text/css">
        <title>영덕익명게시판</title>
</head>

<body>
<?php
               $connect = mysqli_connect("localhost","hkyr03v3_ku","hkyr03v3_ku","hkyr03v3_user") or die("fail");
                $query ="select * from board order by number desc";
                $result = $connect->query($query);
                $total = mysqli_num_rows($result);
 
        ?>
        <div class="bck" style="height:100%;">
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
        <div class = text>
        <font style="cursor: hand"onClick="location.href='./write.php'">글 쓰기</font>
        </div>
      
        <table align = center>
        <thead align = "center" class="head">
        <tr>
        <td width = "50" align="center">번호</td>
        <td width = "500" align = "center">제목</td>
        <td width = "100" align = "center">작성자</td>
        <td width = "200" align = "center">날짜</td>
        <td width = "50" align = "center">조회수</td>
        </tr>
        </thead>
 
        <tbody>
        <?php
                while($rows = mysqli_fetch_assoc($result)){ //DB에 저장된 데이터 수 (열 기준)
                        if($total%2==0){
        ?>                      <tr class = "even">
                        <?php   }
                        else{
        ?>                      <tr>
                        <?php } ?>
                <td width = "50" align = "center"><?php echo $total?></td>
                <td width = "500" align = "center" class="brd">
                <a href = "view.php?number=<?php echo $rows['number']?>">
                <div class="titlecover"><?php echo $rows['title']?>  
                <div class="commentscolor"><small> [<?php echo $rows['count']?>]</small></div></div>
                </td>
                <td width = "100" align = "center">
                <?php 
                if (isset($_SESSION['loggedin']))
                {
                    
                    if ($rows['name'] == admin)
                    {
                       echo 관리자;
                    }
                    else if ($myname == $rows['name'])
                    {
                    echo 나;
                    }
                    else
                    {
                    echo 익명;
                    }
                
                }
                else
                {
                    if ($rows['name'] == admin)
                    {
                       echo 관리자;
                    }
                    else
                    {
                    echo 익명;
                    }
                }
                
                ?>
                </td>
                <td width = "200" align = "center"><?php echo $rows['date']?></td>
                <td width = "50" align = "center"><?php echo $rows['hit']?></td>
                </tr>
        <?php
                $total--;
                }
        ?>
        </tbody>
        </table>
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