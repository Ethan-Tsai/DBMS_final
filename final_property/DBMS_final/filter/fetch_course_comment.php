<?php
//fetch_comment.php
$connect = new PDO('mysql:host=localhost;dbname=dbms_final', 'root', '');
$post_id = $_GET['post_id'];

$query = "
SELECT * FROM course_comment as com
JOIN `member` as m ON m.mId = com.comment_sender_name
WHERE parent_comment_id = '0' AND `post_id` = $post_id
ORDER BY comment_id DESC
";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$output = '';
foreach ($result as $row) {
    $comment = $row["comment"];

    // Apply the five conditions for filtering
    if (
        containsKeyword($comment, '很') ||
        containsKeyword($comment, '好') ||
        containsKeyword($comment, '分') ||
        containsKeyword($comment, '要') ||
        containsKeyword($comment, '課')
    ) {
        $output .= '
        <div class="panel panel-default">
            <div class="panel-heading">By <b>' . $row["name"] . '</b> on <i>' . $row["date"] . '</i></div>
            <div class="panel-body">' . $comment . '</div>
            <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="' . $row["comment_id"] . '">Reply</button></div>
        </div>
        ';
        $output .= get_reply_comment($connect, $row["comment_id"]);
    }
}

echo $output;

function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
    $query = "
    SELECT * FROM course_comment WHERE parent_comment_id = '" . $parent_id . "'
    ";
    $output = '';
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $count = $statement->rowCount();
    if ($parent_id == 0) {
        $marginleft = 0;
    } else {
        $marginleft = $marginleft + 48;
    }
    if ($count > 0) {
        foreach ($result as $row) {
            $output .= '
            <div class="panel panel-default" style="margin-left:' . $marginleft . 'px">
                <div class="panel-heading">By <b>' . $row["comment_sender_name"] . '</b> on <i>' . $row["date"] . '</i></div>
                <div class="panel-body">' . $row["comment"] . '</div>
                <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="' . $row["comment_id"] . '">Reply</button></div>
            </div>
            ';
            $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
        }
    }
    return $output;
}

function containsKeyword($text, $keyword)
{
    return strpos(strtolower($text), strtolower($keyword)) !== false;
}
?>
