<?php
include("../config.php");


$bookname = $_POST["bookname"];
$ISBN = $_POST["ISBN"];
$condition = $_POST["condition"];
$state=$_POST["state"];
$price=$_POST["price"];
$dep=$_POST["dep"];
$mid=$_POST["mid"];


if (is_uploaded_file($_FILES["cover_pic"]["tmp_name"])) {

    move_uploaded_file($_FILES["cover_pic"]["tmp_name"], "../img/book/".$mid."/".$ISBN.".jpg");

    $pic_route = "../img/book/".$mid."/".$ISBN.".jpg";
}else{
    print "Error: required file not uploaded";
}

$add = "INSERT INTO `book` (`bookname`,`mid`,`ISBN`,`picture`,`condition`,`state`,`price`,`dep`) 
VALUES('$bookname','$mid','$ISBN',' $pic_route','$condition','$state','$price','$dep')";
$db->exec($add);



// // Send email to interested users
// $query = "SELECT * FROM member WHERE interested_dep = '$dep'";
// $statement = $db->prepare($query);
// $statement->execute();
// $result = $statement->fetchAll();

// foreach ($result as $row) {
//     $to = $row['email'];
//     $subject = 'New Book Added!';
//     $message = 'A new book has been added that may be of interest to you. Check it out!';
//     $headers = 'From: your_email@example.com' . "\r\n" .
//         'Reply-To: your_email@example.com' . "\r\n" .
//         'X-Mailer: PHP/' . phpversion();

//     // Send the email
//     mail($to, $subject, $message, $headers);
// }




?>
<script>
    alert("Upload success!");
    location.href='javascript:history.go(-2)';
</script>

