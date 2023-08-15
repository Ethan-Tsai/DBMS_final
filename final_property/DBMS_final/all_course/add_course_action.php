<?php
include("course_connection.php");

$course_name = $_POST["course_name"];
$course_id = $_POST["course_id"];
$difficulty = $_POST["difficulty"];
$sweetness = $_POST["sweetness"];
$coolness = $_POST["coolness"];
$content = $_POST["description"];
$user_id = $_POST["user_id"];
$content_more=$_POST["description2"];

$sql = "INSERT INTO `description` (`course_name`, `course_id`, `difficulty`, `sweetness`, `coolness`, `content`, `user_id`,`more_content`) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$course_name, $course_id, $difficulty, $sweetness, $coolness, $content, $user_id,$content_more]);
?>

<script>
    alert("Course review added!");
    window.location.href="../all_book/related_course/link_course.php";
    // window.location.href = "Home.php";
</script>
