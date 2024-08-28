<?php
session_start();

                date_default_timezone_set('Asia/Seoul');
                $connect = mysqli_connect("localhost","","","") or die("fail");
                $myname = $_SESSION['name'];
                 $id = $_GET[name];                      //Writer
                $pw = $_GET[pw];                        //Password
                $title = $_GET[title];                  //Title
                $content = $_GET[content];              //Content
                $date = date('Y-m-d H:i:s');            //Date  //Date
                $URL = './board.php';                   //return UR
                $query = "insert into board (number,title, content, date, hit, id, password, name) 
                        values(null,'$title', '$content', '$date',0, '$id', '$pw', '$myname')";
                
            

                $result = $connect->query($query);
                if($result){
?>                  <script>
                        alert("<?php echo "글이 등록되었습니다."?>");
                        location.replace("<?php echo $URL?>");
                      
                        
                
                    </script>
<?php
                }
                else{
                        echo "FAIL";
                }
 
                mysqli_close($connect);
?>