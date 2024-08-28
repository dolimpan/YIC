<?php
 session_start();
                 $connect = mysqli_connect("localhost","","","") or die("fail");
                $number = $_GET['number'];
                session_start();
                $query = "select dislikes, likes, title, content, date, hit, id, name from board where number =$number";
                $result = $connect->query($query);
                $rows = mysqli_fetch_assoc($result);
                $myname = $_SESSION['name'];
                $servername = "select name from board where number =$number";
                $hit = "update board set hit=hit+1 where number=$number";
                $likes = "update board set likes=likes+1 where number=$number";
                $connect->query($hit);
        ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8027810920130280"
     crossorigin="anonymous"></script>
    <link href="view.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="comments.css" rel="stylesheet" type="text/css">
    <link href="font.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

</head>

<body>
    <?php $bno = $_GET['idx']; ?>
    <div class="bck" style="height:100vw;">
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
                <li><a href="#">내 시간표</a>
                    <ul class="dep2">
                    </ul>
                </li>
                <li><a href="food.html">오늘의급식</a>
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

    <table class="view_table">
        <tr>
            <td colspan="4" class="view_title">
                <?php echo $rows['title']?>
            </td>
        </tr>
        <tr>
            <td class="view_id">작성자</td>
            <td class="view_id2">
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
            <td class="view_hit">조회수</td>
            <td class="view_hit2">
                <?php echo $rows['hit']?>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="view_content" valign="top">
                <?php echo $rows['content']?>
            </td>
        </tr>
    </table>


    <div class="like">
        <a href="like.php?number=<?=$number?>"><img src="images/up.jpg" class="likeicon"></a>
          <div class="number">
                <?php echo $rows['likes']?>
          </div>
    </div>
    <div class="dislike">
        <a href="dislike.php?number=<?=$number?>"><img src="images/down.jpg" class="dislikeicon"></a>
          <div class="number">
            <?php echo $rows['dislikes']?>
          </div>
    </div>

    <!-- MODIFY & DELETE -->
    <div class="view_btn">
        <button class="view_btn1" onclick="location.href='./board.php'">목록</button>
        <button class="view_btn1"
            onclick="location.href='./modify.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">수정</button>

        <button class="view_btn1"
            onclick="location.href='./delete.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">삭제</button>
    </div>


<div class="comments"></div>

<script>
var str = '<?= $number?>';
const comments_page_id = str; // This number should be unique on every page
fetch("comments.php?page_id=" + comments_page_id).then(response => response.text()).then(data => {
	document.querySelector(".comments").innerHTML = data;
	document.querySelectorAll(".comments .write_comment_btn, .comments .reply_comment_btn").forEach(element => {
		element.onclick = event => {
			event.preventDefault();
			document.querySelectorAll(".comments .write_comment").forEach(element => element.style.display = 'none');
			document.querySelector("div[data-comment-id='" + element.getAttribute("data-comment-id") + "']").style.display = 'block';
		};
	});
	document.querySelectorAll(".comments .write_comment form").forEach(element => {
		element.onsubmit = event => {
			event.preventDefault();
			fetch("comments.php?page_id=" + comments_page_id, {
				method: 'POST',
				body: new FormData(element)
			}).then(response => response.text()).then(data => {
				element.parentElement.innerHTML = data;
			});
		};
	});
});
</script>
</body>