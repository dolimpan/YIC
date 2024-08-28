<?php
                session_start();
                $URL = "./YDK-login.html";
                if(!isset($_SESSION['loggedin'])) {
        ?>
 
                <script>
                        alert("로그인이 필요합니다");
                        location.replace("<?php echo $URL?>");
                </script>
        <?php
                }
        ?>

<!DOCTYPE>
 
<html>
<head>
        <meta charset = 'utf-8'>
</head>
<style>
        table.table2{
                border-collapse: separate;
                border-spacing: 1px;
                text-align: left;
                line-height: 1.5;
                border-top: 1px solid #ccc;
                margin : 20px 10px;
        }
        table.table2 tr {
                 width: 50px;
                 padding: 10px;
                font-weight: bold;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
        }
        table.table2 td {
                 width: 100px;
                 padding: 10px;
                 vertical-align: top;
                 border-bottom: 1px solid #ccc;
        }
 
</style>
<body>
        <form method = "get" action = "write_action.php">
        <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
                <tr>
                <td height=20 align= center bgcolor=#ccc><font color=black> 글쓰기</font></td>
                </tr>
                <tr>
                <td bgcolor=white>
                <table class = "table2">
                        
                        <tr>
                        <td>제목</td>
                        <td><input type = text name = title size=60 required></td>
                        </tr>
 
                        <tr>
                        <td>내용</td>
                        <td><textarea name = content cols=85 rows=15 required placeholder="글쓰기 전 잠깐!! 타인에 대한 비방글은 삼가주세요"></textarea></td>
                        </tr>
 
                        <tr>
                        <td style="white-space:nowrap;">이미지 업로드</td>
                        <td><input type = "file" size = 100 name="upload"></td>
                        </tr>
                        </table>
 
                        <center>
                        <button class="view_btn1" onclick="location.href='./board.php'">목록</button>
                        <input type = "submit" value="작성">
                        </center>
                </td>
                </tr>
        </table>
        </form>
</body>
</html>
 
