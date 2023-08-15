<?php
session_start();
$is_invalid = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/database.php";
    $sql = sprintf("SELECT * FROM member
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"])) {
            session_regenerate_id();
            $_SESSION["user_id"] = $user["mId"];
            header("Location: Home.php");
            exit;
        }
    }
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" hred="style.css">
    <link rel="stylesheet" href="https://unpkg.com/boltcss/bolt.min.css"> 
    <link rel="stylesheet" href="style.css">   
</head>
<body>
    
    <h1>Login</h1>
    
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    
    <form method="post" id="my-login-form">

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email"
                value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>

        <button>Log in</button>

        <p>Don't have an account yet? <a href="signup.html">Sign up</a> and join us!</p>

    </form>
    
</body>

</html>