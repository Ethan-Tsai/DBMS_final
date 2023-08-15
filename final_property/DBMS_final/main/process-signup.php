<?php
session_start();
include("../config.php");
$name = $_POST["name"];
$pass = $_POST["password"];
$email = $_POST["email"];
$method = $_POST["method"];
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);


$legal=1;

if (empty($_POST["name"])) {
    $msg="Name is required";
    $legal=0;
    // die("Name is required");
    
}
if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $msg="Valid email is required";
    $legal=0;
    // die("Valid email is required");
}
if (strlen($_POST["password"]) < 8) {
    $msg="Password must be at least 8 characters";
    $legal=0;
    // die("Password must be at least 8 characters");
}
if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    $msg="Password must contain at least one letter";
    $legal=0;
    // die("Password must contain at least one letter");
}
if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    $msg="Password must contain at least one number";
    $legal=0;
    // die("Password must contain at least one number");
}
if ($_POST["password"] !== $_POST["password_confirmation"]) {
    $msg="Passwords must match";
    $legal=0;
    // die("Passwords must match");
}


if($legal==0){
    
echo "<script>";
echo "alert('$msg'+\" !請重新註冊\");";
echo "location.href='javascript:history.go(-1)';";
echo "</script>";

}else{
//     echo "<script>";
//     echo "alert('aaaaa');";
//     echo "</script>";

// $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// $mysqli = require __DIR__ . "/database.php";

// $sql = "INSERT INTO user (name, email, password_hash)
//         VALUES (?, ?, ?)";
        
// $stmt = $mysqli->stmt_init();


// if ( ! $stmt->prepare($sql)) {
//     die("SQL error: " . $mysqli->error);
// }

// $stmt->bind_param("sss",
//                   $_POST["name"],
//                   $_POST["email"],
//                   $password_hash);
                  
// if ($stmt->execute()) {

//     header("Location: signup-success.html");
//     exit;
    
// } else {

//     if ($mysqli->errno === 1062) {
//         die("email already taken");
//     } else {
//         die($mysqli->error . " " . $mysqli->errno);
//     }
// }






$resultAcc = $db->query("SELECT * FROM `member` WHERE `email` = '$email'");
$num = $resultAcc->rowCount();
echo $num;
echo "!";
if($method==1){

    if($num){
    
        foreach($resultAcc as $row){
            if($pass==$row['pass']){
                $url = './Home.php';
                $msg = "登入成功";
                $_SESSION['DBMS_final'] = $row['id'];
            }
            else{
                $url = './login_function.php';
                $msg = "密碼錯誤";
            }
        } 
    }
    else{
        $url = './signup.html';
        $msg = "帳號不存在";
    }
}
else{
    if($num){
        $url = './signup.html';
        $msg = "此帳號已被註冊";
    }
    else{
        $addacc ="INSERT INTO `member`(`name`,`email`,`password_hash`)VALUES('$name','$email','$password_hash')";
        $db->exec($addacc);

        $sql = $db->query("SELECT *FROM`member` WHERE `email`='$email'");
        foreach ($sql as $row) {
            $n=$row['mId'];
        if(mkdir("../img/book/$n", 0700))
            echo "成功建立資料夾"."<br>";
        else
            echo "建立資料夾失敗"."<br>";
        }
        $url = 'login_function.php';
        $msg = "註冊完成，請重新登入";
    }




}
echo "<script>";
echo "alert('$msg');";

echo "location.href='$url';";
echo "</script>";

}








