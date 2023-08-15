 <?php
// $book="資料庫的核心理論與實務";
// $book_mid=42;
//fetch_comment.php
$connect = new PDO('mysql:host=localhost;dbname=dbms_final', 'root', '');
$book = $_GET['bookname'];
$book_mid = $_GET['mId'];
echo $book;

// Define the three conditions
$condition1 = $book; // First condition
$condition2 = '用'; // Second condition
$condition3 = '很'; // Third condition
$condition4='爛';
$condition5='好';


$query = "
SELECT * FROM tbl_comment as com
JOIN `member` as m ON m.mId = com.comment_sender_name
WHERE parent_comment_id = '0' AND `book_mId` = $book_mid AND `bookname` = '$book' AND
(comment LIKE '%$condition1%' OR comment LIKE '%$condition2%' OR comment LIKE '%$condition3%' OR comment LIKE '%$condition4%' OR comment LIKE '%$condition5%')
ORDER BY comment_id DESC
";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$output = '';
foreach ($result as $row) {
    $output .= '
    <div class="panel panel-default">
        <div class="panel-heading">By <b>' . $row["name"] . '</b> on <i>' . $row["date"] . '</i></div>
        <div class="panel-body">' . $row["comment"] . '</div>
        <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="' . $row["comment_id"] . '">Reply</button></div>
    </div>
    ';
    $output .= get_reply_comment($connect, $row["comment_id"]);
}

echo $output;

function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
    $query = "
    SELECT * FROM tbl_comment as com
    JOIN `member` as m ON m.mId=com.comment_sender_name
    WHERE parent_comment_id = '" . $parent_id . "'
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
                <div class="panel-heading">By <b>' . $row["name"] . '</b> on <i>' . $row["date"] . '</i></div>
                <div class="panel-body">' . $row["comment"] . '</div>
                <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="' . $row["comment_id"] . '">Reply</button></div>
            </div>
            ';
            $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
        }
    }
    return $output;
}

?>

