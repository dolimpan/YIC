<?php
 session_start();
// Update the details below with your MySQL details
$DATABASE_HOST = 'localhost';
$DATABASE_USER = '';
$DATABASE_PASS = '';
$DATABASE_NAME = '';

$quer = "select id, nameid from comments where page_id = $coa";





$myname = $_SESSION['name'];
$cnt = "update board set count=count+1 where number=$coa";

                date_default_timezone_set('Asia/Seoul');
try {
    $pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
} catch (PDOException $exception) {
    // If there is an error with the connection, stop the script and display the error
    exit('Failed to connect to database!');
}



function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    $string = array('y' => '년', 'm' => '달', 'w' => '주', 'd' => '일', 'h' => '시간', 'i' => '분', 's' => '초');
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . '전' : '방금전';
}

function show_comments($comments, $parent_id = -1) {
    $html = '';
    if ($parent_id != -1) {
        // If the comments are replies sort them by the "submit_date" column
        array_multisort(array_column($comments, 'submit_date'), SORT_ASC, $comments);
    }
    // Iterate the comments using the foreach loop
    foreach ($comments as $comment) {
        if ($comment['parent_id'] == $parent_id) {
            // Add the comment to the $html variable
            $html .= '
            <div class="comment">
                <div>
                    <h3 class="name">'. htmlspecialchars($result.익명, ENT_QUOTES) . '</h3>
                    <span class="date">' . time_elapsed_string($comment['submit_date']) . '</span>
                </div>
                <p class="content">' . nl2br(htmlspecialchars($comment['content'], ENT_QUOTES)) . '</p>
                <a class="reply_comment_btn" href="#" data-comment-id="' . $comment['id'] . '">Reply</a>
                <hr class="line">
                ' . show_write_comment_form($comment['id']) . '
                <div class="replies">
                ' . show_comments($comments, $comment['id']) . '
                </div>
            </div>
            ';
        }
    }
    return $html;
}


       
            
           
// This function is the template for the write comment form
function show_write_comment_form($parent_id = -1) {
    $html = '
    <div class="write_comment" data-comment-id="' . $parent_id . '">
        <form>
            <input name="parent_id" type="hidden" value="' . $parent_id . '">
            <textarea name="content" placeholder="댓글을 입력하세요" required></textarea>
            <button type="submit">작성하기</button>
        </form>
    </div>
    ';
    return $html;
}

if (isset($_GET['page_id'])) {
    // Check if the submitted form variables exist
    if ($_POST['content']) {
        if (isset($_SESSION['loggedin'])) {
        
        // POST variables exist, insert a new comment into the MySQL comments table (user submitted form)
        $stmt = $pdo->prepare('INSERT INTO comments (page_id, parent_id, name, content, nameid, submit_date) VALUES (?,?,?,?,?,NOW())');
        $stmt->execute([ $_GET['page_id'], $_POST['parent_id'], $_SESSION['name'], $_POST['content'], $_SESSION['name']]);
        $stmt = $pdo->prepare('update board set count=count+1 where number = ?');
        $stmt->execute([ $_GET['page_id'] ]);
        exit('댓글이 작성되었습니다');
        }
        else
        {
            exit('로그인을 해주세요');
        }
    }
    // Get all comments by the Page ID ordered by the submit date
    $stmt = $pdo->prepare('SELECT * FROM comments WHERE page_id = ? ORDER BY submit_date ASC');
    $stmt->execute([ $_GET['page_id'] ]);
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Get the total number of comments
    $stmt = $pdo->prepare('SELECT COUNT(*) AS total_comments FROM comments WHERE page_id = ?');
    $stmt->execute([ $_GET['page_id'] ]);
    $comments_info = $stmt->fetch(PDO::FETCH_ASSOC);
   
} else {
    exit('No page ID specified!');
}
?>

<div class="comment_header">
    
    <span class="total"><?=$comments_info['total_comments'] ?> 댓글</span>
    <a href="#" class="write_comment_btn" data-comment-id="-1">댓글 작성하기</a>
</div>

<?=show_write_comment_form()?>

<?=show_comments($comments)?>
