<?php
    $connect = mysqli_connect("localhost","","","") or die("fail");

    $name = $_POST[name];
    $title = $_POST[title];
    $content = $_POST[content];
    $URL = '/board.php';

    $query = "insert into board (name, title, content) values ('$name','$title', '$content')";

    $result = $connect->query($query);
    if($result)
    {

?>        <script>
            alert("<?php echo "등록" ?>");
            location.replace("<?php echo $URL?>");
        </script>
<?php

    }
    else 
    {
        echo "FAILED";
    }

    mysqil_close($connect);
?>