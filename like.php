<?php
 session_start(); //이 문장은 맨위에 들어가야함
                 $connect = mysqli_connect("localhost","","","") or die("fail");
                $number = $_GET['number'];
                $query = "select title, content, date, hit, id from board where number =$number";
                $result = $connect->query($query);
                $rows = mysqli_fetch_assoc($result);
                $likes = "update board set likes=likes+1 where number=$number";
                
                
                






if(!isset($_SESSION['like'.$number]) && isset($_SESSION['loggedin']))
{
    $connect->query($likes); ?>
<script>

        alert('추천하셨습니다.');
        <?php
        session_regenerate_id(true);
        $_SESSION['like'.$number] = 1;
    ?>
    location.href='https://ydinside.com/view.php?number=<?=$number?>'</script> <?php
}
else if(!isset($_SESSION['loggedin']))
{
    ?>
    <script>
        alert('로그인이 필요합니다.');
        location.href='https://ydinside.com/YDK-login.html'</script><?php
}
else
{?>
    <script>
        alert('이미 추천하셨습니다.');
        location.href='https://ydinside.com/view.php?number=<?=$number?>'</script>
    <?php
}

 ?>
  
   
        
        
        

		

