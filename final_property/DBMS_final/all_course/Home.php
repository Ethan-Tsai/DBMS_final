<?php
session_start();

include("../config.php");
?>

<!--Database-->
<?php

if (isset($_SESSION["user_id"])) {
    try {
        $db = new PDO("mysql:dbname=DBMS_final;host=localhost", "root", "");
        $sql = "SELECT * FROM member WHERE mid = :user_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":user_id", $_SESSION["user_id"]);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>

<?php
require_once 'course_connection.php';
$sql = "SELECT *,COUNT(c.comment_id+c.parent_comment_id) as com_num FROM `description` AS d LEFT JOIN `course_comment` as c ON d.dId=c.post_id GROUP BY d.dId";
$stmt = $conn->query($sql);
$all_description = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="new_nicepage.css" media="screen">
    <link rel="stylesheet" href="Home.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="new_jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="new_nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.9.3, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Lato:100,100i,300,300i,400,400i,700,700i,900,900i">
    <link id="u-page-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "",
            "logo": "images/default-logo.png"
        }
    </script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
    <meta data-intl-tel-input-cdn-path="intlTelInput/">
    <!---->
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
    <meta data-intl-tel-input-cdn-path="intlTelInput/">

    <!--js-->
    <script src="./jquery.js"></script>
    <script src="./display_function/search.js"></script>
    <script src="./main.js"></script>
    <script src="./sort/sort.js"></script>
    <script src="../jquery-3.6.4.min.js"></script>
    <script src="./add_like.js"></script>
    <!--css-->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./theme.min.css">

    <title>Course</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="popup.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boltcss/bolt.min.css">

</head>

<body class="u-body u-xl-mode" data-lang="en">

    <!--Header start-->
    <header class="u-header u-palette-2-dark-2 u-sticky u-header" id="sec-c67f" data-animation-name=""
        data-animation-duration="0" data-animation-delay="0" data-animation-direction="">

        <div class="u-clearfix u-sheet u-sheet-1">

            <!--Nav menu-->
            <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">

                <div class="menu-collapse"
                    style="font-size: 1.5rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
                    <a class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-left-right-menu-spacing u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link"
                        href="../main/Home.php">
                        <svg class="u-svg-link" viewBox="0 0 24 24">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                        </svg>
                        <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <rect y="1" width="16" height="2"></rect>
                                <rect y="7" width="16" height="2"></rect>
                                <rect y="13" width="16" height="2"></rect>
                            </g>
                        </svg>
                    </a>
                </div>

                <div class="u-custom-menu u-nav-container">
                    <ul class="u-nav u-spacing-20 u-unstyled u-nav-1">
                        <li class="u-nav-item"><a
                                class="u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-2-light-1 u-text-black u-text-hover-palette-2-light-2"
                                href="../main/Home.php" style="padding: 14px;">Home</a></li>
                        <li class="u-nav-item"><a
                                class="u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-2-light-1 u-text-black u-text-hover-palette-2-light-2"
                                href="../all_book/Home.php" style="padding: 14px;">Book</a></li>
                        <li class="u-nav-item"><a
                                class="u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-2-light-1 u-text-black u-text-hover-palette-2-light-2"
                                href="Home.php" style="padding: 14px;">Course</a></li>
                    </ul>
                </div>

                <div class="u-custom-menu u-nav-container-collapse">
                    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                        <div class="u-inner-container-layout u-sidenav-overflow">
                            <div class="u-menu-close"></div>
                            <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="../main/Home.php">Home</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="../all_book/Home.php">Book</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.php">Course</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                </div>

            </nav>

            <a href="../main/Home.php" class="u-image u-logo u-image-1" data-image-width="80" data-image-height="40"
                title="Home">
                <img src="../img/logo.png" class="u-logo-image u-logo-image-1">
            </a>

            <!--Login link-->
            <?php
            if (isset($user)): ?>
                <a href="../main/logout.php"
                    class="u-border-active-palette-2-dark-3 u-border-hover-palette-2-light-2 u-btn u-button-style u-none u-text-body-color u-text-hover-palette-2-light-1 u-btn-1">
                    Logout
                    <span id="login-btn"
                        class="u-file-icon u-icon u-opacity u-opacity-75 u-text-palette-2-light-2 u-icon-1">
                        <img src="images/1828427-e07b7b2e.png" alt="">
                    </span>
                </a>

                <?php
                $mId = $_SESSION["user_id"];
                $get_member_profile = $db->query("SELECT * FROM member where mId = $mId");
                foreach ($get_member_profile as $profile) {
                    $member_image = $profile["image"];
                }
                ?>

                <a href="../profile/profile.php" class="member-photo" id="member-photo">
                    <!-- Manage -->
                    <img src="<?= $member_image ?>" alt="">
                </a>

            <?php else: ?>
                <a href="../main/login_function.php"
                    class="u-border-active-palette-2-dark-3 u-border-hover-palette-2-light-2 u-btn u-button-style u-none u-text-body-color u-text-hover-palette-2-light-1 u-btn-1">
                    Login&nbsp;
                    <span class="u-file-icon u-icon u-opacity u-opacity-75 u-text-palette-2-light-2 u-icon-1">
                        <img src="images/1828395-9a713384.png" alt="">
                    </span>
                </a>
            <?php endif; ?>

        </div>

    </header>
    <!--Header end-->

    <main>


        <?php if ($_SERVER["REQUEST_METHOD"] == "GET") { ?>

            <!-- Search box start -->
            <form method="post" class="search_section" style="padding-left:155px">
                <span class="search_instruction">SEARCH COURSE</span>
                <input type="text" name="search">
                <input type="submit" name="submit" class="search-btn">
            </form>
            <!-- Search box end -->

            <!-- sort -->
            <div style="display:flex; justify-content: center">
                <div>
                    <button id="sort1" onclick="defaultsort()" style="margin-top:20px; margin-right:10px;">Most
                        Recent</button>
                </div>
                <div>
                    <button id="sort2" onclick="sortcom()" style="margin-top:20px; margin-left:10px;">Most Commented</button>
                </div>
                <div>
                    <button id="sort3" onclick="sortlike()"
                        style="margin-top:20px; margin-left:10px; margin-right:10px;">Most Liked</button>
                </div>
            </div>
            <!-- sort_end -->

            <div id="display" style="padding-left:150px" >
                <!-- default display from database -->
                <?php foreach ($all_description as $row) { ?>
                    <div class="card" id="card">
                        <div class="caption">
                            <div id="course_name">
                                <b>
                                    <?php echo $row["course_name"]; ?>
                                </b>
   
                             <?php echo $row["course_id"]; ?>
    <!-- like and comment -->
 
<div style="	display: flex;
	flex-direction: column;
	flex-wrap: nowrap;
	justify-content: center;
	align-items: center;
	align-content: flex-end;
    margin:10px;
    position:absolute;
    top:3px;
    right:5px;"
    >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
    <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg><?=$row["com_num"]?>
</div>
<div style="	display: flex;
	flex-direction: column;
	flex-wrap: nowrap;
	justify-content: center;
	align-items: center;
	align-content: flex-end;
    margin:10px;
    position:absolute;
    top:3px;
    right:30px;">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-heart-eyes" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M11.315 10.014a.5.5 0 0 1 .548.736A4.498 4.498 0 0 1 7.965 13a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .548-.736h.005l.017.005.067.015.252.055c.215.046.515.108.857.169.693.124 1.522.242 2.152.242.63 0 1.46-.118 2.152-.242a26.58 26.58 0 0 0 1.109-.224l.067-.015.017-.004.005-.002zM4.756 4.566c.763-1.424 4.02-.12.952 3.434-4.496-1.596-2.35-4.298-.952-3.434zm6.488 0c1.398-.864 3.544 1.838-.952 3.434-3.067-3.554.19-4.858.952-3.434z"/>
</svg><div id="like_num<?=$row["dId"]?>"><?=$row["like_num"]?></div>
</div>

<!-- like and comment -->

                            </div>

                            <div class="rating-position">
                                <div class="star-rate-item" style="display: inline-block;">Difficulty</div>
                                <div class="star-rating" style="display: inline-block;">
                                    <ul class="list-inline">
                                        <?php
                                        $difficulty = $row["difficulty"];
                                        $totalStars = 5;
                                        for ($i = 1; $i <= $totalStars; $i++) {
                                            if ($i <= $difficulty) {
                                                ?>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <?php
                                            } else {
                                                ?>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <div class="star-rate-item" style="display: inline-block;">Grading</div>
                                <div class="star-rating" style="display: inline-block;">
                                    <ul class="list-inline">
                                        <?php
                                        $difficulty = $row["sweetness"];
                                        $totalStars = 5;
                                        for ($i = 1; $i <= $totalStars; $i++) {
                                            if ($i <= $difficulty) {
                                                ?>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <?php
                                            } else {
                                                ?>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <div class="star-rate-item" style="display: inline-block;">Attendance</div>
                                <div class="star-rating" style="display: inline-block;">
                                    <ul class="list-inline">
                                        <?php
                                        $difficulty = $row["coolness"];
                                        $totalStars = 5;
                                        for ($i = 1; $i <= $totalStars; $i++) {
                                            if ($i <= $difficulty) {
                                                ?>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <?php
                                            } else {
                                                ?>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="content">"
                                <?php echo $row["content"]; ?>"
                            </div>
                        </div>

                        <!-- Like button start -->
                        
                            
                            <button type="submit" class="like-btn" id="likebtn<?=$row['dId']?>"   onclick="add_like(<?=$row['dId']?>)">LIKE</button>
                        
                        <!-- Like button end -->

                        <!-- Book detail button start-->
                        <form action="course_detail.php" method="POST">
                            <input type="hidden" name="post_id" value="<?php echo $row['dId']; ?>">
                            <button type="submit" class="read-more-btn">READ MORE</button>
                        </form>
                        <!-- Book detail button end-->

                    </div>
                <?php } ?>
                <!-- default display from database end -->
            </div>

        <?php } elseif ($_SERVER["REQUEST_METHOD"] == "POST") { ?>


            <!-- Search box start -->
            <form method="post" class="search_section" style="padding-left:155px">
                <span class="search_instruction">SEARCH COURSE</span>
                <input type="text" name="search">
                <input type="submit" name="submit" class="search-btn">
            </form>
            <!-- Search box end -->

            <!-- Search function start -->
            <?php
            $con = new PDO("mysql:host=localhost;dbname=dbms_final", 'root', '');
            if (isset($_POST["submit"])) {
                $str = $_POST["search"];
                // SELECT *FROM `description` as d LEFT JOIN course_comment  as c ON d.dId=c.post_id GROUP BY d.dId ORDER BY COUNT(d.dId) DESC
                $sth = $con->prepare("SELECT * FROM `description` WHERE course_name LIKE CONCAT('%', :course_name, '%')");
                // $sth = $con->prepare("SELECT *,COUNT(c.comment_id+c.parent_comment_id) as com_num FROM `description` as d LEFT JOIN course_comment  as c ON d.dId=c.post_id WHERE course_name LIKE CONCAT('%', :course_name, '%')ORDER BY COUNT(d.dId) DESC");
                $sth->bindParam(':course_name', $str);
                $sth->setFetchMode(PDO::FETCH_OBJ);
                $sth->execute();

                $resultCount = $sth->rowCount();

                //average score
                $sth3 = $con->prepare("SELECT AVG(difficulty)as a FROM `description` WHERE course_name LIKE CONCAT('%', :course_name, '%')");
                $sth3->bindParam(':course_name', $str);
                $sth3->setFetchMode(PDO::FETCH_OBJ);
                $sth3->execute();
                while ($row3 = $sth3->fetch()) {
                    $avg_diff = $row3->a;
                }

                $sth2 = $con->prepare("SELECT AVG(sweetness)as a FROM `description` WHERE course_name LIKE CONCAT('%', :course_name, '%')");
                $sth2->bindParam(':course_name', $str);
                $sth2->setFetchMode(PDO::FETCH_OBJ);
                $sth2->execute();
                while ($row2 = $sth2->fetch()) {
                    $avg_sweet = $row2->a;
                }

                $sth4 = $con->prepare("SELECT AVG(coolness)as a FROM `description` WHERE course_name LIKE CONCAT('%', :course_name, '%')");
                $sth4->bindParam(':course_name', $str);
                $sth4->setFetchMode(PDO::FETCH_OBJ);
                $sth4->execute();
                while ($row4 = $sth4->fetch()) {
                    $avg_cool = $row4->a;
                }
                ?>

                <div class="p-container" style="margin-top: 20px">
                    <p><span>
                            <?= $str ?>
                        </span> has
                        <?= $resultCount ?> result(s),
                    </p>
                    <p>Average Difficulty:
                        <?= $avg_diff ?>
                    </p>
                    <p>Average Grading:
                        <?= $avg_sweet ?>
                    </p>
                    <p>Average Attendence:
                        <?= $avg_cool ?>
                    </p>
                </div>

            <!-- sort -->
            <div style="display:flex; justify-content: center">
                <div>
                    <button id="sort1" onclick="defaultsort2('<?=$str?>')" style="margin-top:20px; margin-right:10px;">Most
                        Recent</button>
                </div>
                <div>
                    <button id="sort2" onclick="sortcom2('<?=$str?>')" style="margin-top:20px; margin-left:10px;">Most Commented</button>
                </div>
                <div>
                    <button id="sort3" onclick="sortlike2('<?=$str?>')"
                        style="margin-top:20px; margin-left:10px; margin-right:10px;">Most Liked</button>
                </div>
            </div>
            <!-- sort_end -->

<div id="display2">-
                <?php
                if ($resultCount > 0) {
                    while ($row = $sth->fetch()) { 
                        $us=$row->dId;
                    $con=$db->query("SELECT COUNT(comment_id+parent_comment_id)as com_num FROM `course_comment` INNER JOIN `description` ON 
                    post_id=dId  WHERE post_id=$us GROUP BY post_id");
                    $com_num=0;
                    foreach($con as $co){

                        $com_num=$co["com_num"];
                    
                }
                    ?>
                    
                    <div class="card" id="card" style="margin-left:250px">
                            <div class="caption">
                                <div id="course_name"><b>
                                        <?php echo $row->course_name; ?>
                                    </b>
                                    <?php echo $row->course_id; ?>

    <!-- like and comment -->
 
    <div style="	display: flex;
	flex-direction: column;
	flex-wrap: nowrap;
	justify-content: center;
	align-items: center;
	align-content: flex-end;
    margin:10px;
    position:absolute;
    top:3px;
    right:5px;"
    >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
    <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg><?=$com_num?>
</div>
<div style="	display: flex;
	flex-direction: column;
	flex-wrap: nowrap;
	justify-content: center;
	align-items: center;
	align-content: flex-end;
    margin:10px;
    position:absolute;
    top:3px;
    right:30px;">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-heart-eyes" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M11.315 10.014a.5.5 0 0 1 .548.736A4.498 4.498 0 0 1 7.965 13a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .548-.736h.005l.017.005.067.015.252.055c.215.046.515.108.857.169.693.124 1.522.242 2.152.242.63 0 1.46-.118 2.152-.242a26.58 26.58 0 0 0 1.109-.224l.067-.015.017-.004.005-.002zM4.756 4.566c.763-1.424 4.02-.12.952 3.434-4.496-1.596-2.35-4.298-.952-3.434zm6.488 0c1.398-.864 3.544 1.838-.952 3.434-3.067-3.554.19-4.858.952-3.434z"/>
</svg><div id="like_num<?=$row->dId?>"><?=$row->like_num?></div>
</div>

<!-- like and comment -->




                                    
                                </div>

                                <div class="rating-position">
                                    <div class="star-rate-item" style="display: inline-block;">Difficulty</div>
                                    <div class="star-rating" style="display: inline-block;">
                                        <ul class="list-inline">
                                            <?php
                                            $difficulty = $row->difficulty;
                                            $totalStars = 5;
                                            for ($i = 1; $i <= $totalStars; $i++) {
                                                if ($i <= $difficulty) {
                                                    ?>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>

                                    <div class="star-rate-item" style="display: inline-block;">Grading</div>
                                    <div class="star-rating" style="display: inline-block;">
                                        <ul class="list-inline">
                                            <?php
                                            $grading = $row->sweetness;
                                            $totalStars = 5;
                                            for ($i = 1; $i <= $totalStars; $i++) {
                                                if ($i <= $grading) {
                                                    ?>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>

                                    <div class="star-rate-item" style="display: inline-block;">Attendance</div>
                                    <div class="star-rating" style="display: inline-block;">
                                        <ul class="list-inline">
                                            <?php
                                            $attendance = $row->coolness;
                                            $totalStars = 5;
                                            for ($i = 1; $i <= $totalStars; $i++) {
                                                if ($i <= $attendance) {
                                                    ?>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">"
                                    <?php echo $row->content; ?>"
                                </div>
                            </div>
                            <!-- Like button start -->
                            <button  class="like-btn"onclick="add_like(<?=$row->dId?>)" id="likebtn<?=$row->dId?>">LIKE</button>
                            <!-- Like button end -->

                            <!-- Book detail button start-->
                            <form action="course_detail.php" method="POST">
                                <input type="hidden" name="post_id" value="<?php echo $row->dId; ?>">
                                <button type="submit" class="read-more-btn">READ MORE</button>
                            </form>
                            <!-- Book detail button end -->
                        </div>

                        <?php
                        
                    }
                } else { ?>
                    <div style="font-size: 23px; 
                                color:brown;
                                height: 500px;
                                display: flex; 
                                justify-content: center;
                                margin-top: 80px;
                                ">No course review found!</div>
                    <?php
                }
                ?>

                <?php
            } ?>
            </div>
            <!-- Search Function End -->

        <?php } ?>
        </div>
    </main>

    <!-- form start -->
    <div class="container" id="blur">


        <?php

        if (isset($user)) { ?>

            <div class="post-btn-position">
                <button id="add-btn" class="post-btn-design">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-plus" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 20l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4h4z"></path>
                        <path d="M13.5 6.5l4 4"></path>
                        <path d="M16 18h4m-2 -2v4"></path>
                    </svg>
                </button>
            </div>
        <?php } ?>

        <form action="./add_course_action.php" method="post" id="add_form" enctype="multipart/form-data">
            <div class="popup" id="popup">

                <div class="close-btn">&times;</div>

                <div class="form">

                    <p>Course Review</p>

                    <div class="form-element">
                        <label for="course_name">Course name</label>
                        <input type="text" id="course_name" name="course_name">
                    </div>

                    <div class="form-element">
                        <label for="course_id">Course ID</label>
                        <input type="text" id="course_id" name="course_id">
                    </div>

                    <div class="selection_box">
                        <div class="selection_item">
                            <label for="difficulty">Difficulty</label>
                            <select name="difficulty" id="difficulty">
                                <option value=""> </option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="selection_item">
                            <label for="sweetness">Grading</label>
                            <select name="sweetness" id="sweetness">
                                <option value=""> </option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="selection_item">
                            <label for="coolness">Attendance</label>
                            <select name="coolness" id="coolness">
                                <option value=""> </option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>


                    </div>
                    <div class="selection_box">
                        <div class="selection_item">
                            <label for="dep">Department</label>
                            <select name="dep" id="dep">
                            <option value="資管">資管</option>
<option value="應數">應數</option>
<option value="外文">外文</option>
<option value="機電">機電</option>
<option value="海工">海工</option>
<option value="中文">中文</option>
<option value="跨院">跨院</option>
<option value="博雅">博雅</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-element">
                        <label for="description">Tittle</label>
                        <textarea name="description" id="description" cols="20" rows="2"
                            placeholder="Enter Post Tittle"></textarea>
                    </div>

                    <div class="form-element">
                        <label for="description2">Course Description</label>
                        <textarea name="description2" id="description2" cols="100" rows="5"
                            placeholder="Enter course description"></textarea>
                    </div>

                    <div>
                        <?php
                        $u = $_SESSION["user_id"];
                        ?>
                        <input type="hidden" name="user_id" value="<?= $u ?>">
                    </div>


                    <div class="form-element-button">
                        <button type="submit">Post</button>
                    </div>

                </div>
            </div>
    </div>
    </form>

    <script type="text/javascript">
        function toggle() {
            var blur = document.getElementById('blur');
            blur.classList.toggle('active');
            var popup = document.getElementById('popup');
            popup.classList.toggle('active');
        }

        var addBtn = document.getElementById('add-btn');
        addBtn.addEventListener('click', toggle);
        var closeBtn = document.querySelector('.close-btn');
        closeBtn.addEventListener('click', toggle);    
    </script>
    <!-- form end -->



    <!--Footer starts-->
    <footer class="u-align-center-md u-align-center-sm u-align-center-xs u-clearfix u-footer u-palette-2-dark-2"
        id="sec-b7f2">

        <!--Footer div start-->
        <div class="u-clearfix u-sheet u-sheet-1">

            <!--Footer nav start-->
            <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
                <div class="menu-collapse" style="font-size: 1.75rem;">
                    <a class="u-button-style u-custom-text-color u-custom-text-hover-color u-nav-link"
                        href="../main/Home.php">
                        <svg class="u-svg-link" viewBox="0 0 24 24">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-fab7"></use>
                        </svg>
                        <svg class="u-svg-content" version="1.1" id="svg-fab7" viewBox="0 0 16 16" x="0px" y="0px"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <rect y="1" width="16" height="2"></rect>
                                <rect y="7" width="16" height="2"></rect>
                                <rect y="13" width="16" height="2"></rect>
                            </g>
                        </svg>
                    </a>
                </div>

                <div class="u-custom-menu u-nav-container">
                    <ul class="u-nav u-unstyled u-nav-1">
                        <li class="u-nav-item"><a
                                class="u-button-style u-nav-link u-text-hover-palette-2-light-2 u-text-palette-2-dark-3"
                                href="../main/Home.php" style="padding: 10px 18px;">Home</a></li>
                        <li class="u-nav-item"><a
                                class="u-button-style u-nav-link u-text-hover-palette-2-light-2 u-text-palette-2-dark-3"
                                href="../all_book/Home.php" style="padding: 10px 18px;">Book</a></li>
                        <li class="u-nav-item"><a
                                class="u-button-style u-nav-link u-text-hover-palette-2-light-2 u-text-palette-2-dark-3"
                                href="Home.php" style="padding: 10px 18px;">Course</a></li>
                        <li class="u-nav-item">
                            <!--Login link-->
                            <?php
                            if (isset($user)): ?>
                                <a href="../main/logout.php"
                                    class="u-border-active-palette-2-dark-3 u-border-hover-palette-2-light-2 u-btn u-button-style u-none u-text-body-color u-text-hover-palette-2-light-1 u-btn-1">
                                    Logout
                                </a>
                            <?php else: ?>
                                <a href="../main/login_function.php"
                                    class="u-border-active-palette-2-dark-3 u-border-hover-palette-2-light-2 u-btn u-button-style u-none u-text-body-color u-text-hover-palette-2-light-1 u-btn-1">
                                    Login&nbsp;
                                </a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>

                <div class="u-custom-menu u-nav-container-collapse">
                    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                        <div class="u-inner-container-layout u-sidenav-overflow">
                            <div class="u-menu-close"></div>
                            <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="../main/Home.php">Home</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="../all_book/Home.php">Book</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="../all_course/Home.php">Course</a></li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Login.php">Login</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                </div>
                <!--Footer nav end-->
            </nav>

            <!--Logo link-->
            <a href="../main/Home.php" class="u-image u-logo u-image-1" data-image-width="80" data-image-height="40">
                <img src="../img/logo.png" class="u-logo-image u-logo-image-1">
            </a>

            <!--Social icon box-->
            <div class="u-align-left u-social-icons u-spacing-10 u-social-icons-1">

                <!--Facebook link-->
                <a class="u-social-url" title="facebook" target="_blank" href="">
                    <span class="u-icon u-social-facebook u-social-icon u-text-palette-2-dark-3">
                        <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-bbef"></use>
                        </svg>
                        <svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-bbef">
                            <circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle>
                            <path fill="#FFFFFF"
                                d="M73.5,31.6h-9.1c-1.4,0-3.6,0.8-3.6,3.9v8.5h12.6L72,58.3H60.8v40.8H43.9V58.3h-8V43.9h8v-9.2c0-6.7,3.1-17,17-17h12.5v13.9H73.5z">
                            </path>
                        </svg>
                    </span>
                </a>

                <!--Twitter link-->
                <a class="u-social-url" title="twitter" target="_blank" href="">
                    <span class="u-icon u-social-icon u-social-twitter u-text-palette-2-dark-3">
                        <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-7563"></use>
                        </svg>
                        <svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-7563">
                            <circle fill="currentColor" class="st0" cx="56.1" cy="56.1" r="55"></circle>
                            <path fill="#FFFFFF"
                                d="M83.8,47.3c0,0.6,0,1.2,0,1.7c0,17.7-13.5,38.2-38.2,38.2C38,87.2,31,85,25,81.2c1,0.1,2.1,0.2,3.2,0.2c6.3,0,12.1-2.1,16.7-5.7c-5.9-0.1-10.8-4-12.5-9.3c0.8,0.2,1.7,0.2,2.5,0.2c1.2,0,2.4-0.2,3.5-0.5c-6.1-1.2-10.8-6.7-10.8-13.1c0-0.1,0-0.1,0-0.2c1.8,1,3.9,1.6,6.1,1.7c-3.6-2.4-6-6.5-6-11.2c0-2.5,0.7-4.8,1.8-6.7c6.6,8.1,16.5,13.5,27.6,14c-0.2-1-0.3-2-0.3-3.1c0-7.4,6-13.4,13.4-13.4c3.9,0,7.3,1.6,9.8,4.2c3.1-0.6,5.9-1.7,8.5-3.3c-1,3.1-3.1,5.8-5.9,7.4c2.7-0.3,5.3-1,7.7-2.1C88.7,43,86.4,45.4,83.8,47.3z">
                            </path>
                        </svg>
                    </span>
                </a>

                <!--Instagram link-->
                <a class="u-social-url" title="instagram" target="_blank" href="">
                    <span class="u-icon u-social-icon u-social-instagram u-text-palette-2-dark-3">
                        <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-1e95"></use>
                        </svg>
                        <svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-1e95">
                            <circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle>
                            <path fill="#FFFFFF"
                                d="M55.9,38.2c-9.9,0-17.9,8-17.9,17.9C38,66,46,74,55.9,74c9.9,0,17.9-8,17.9-17.9C73.8,46.2,65.8,38.2,55.9,38.2z M55.9,66.4c-5.7,0-10.3-4.6-10.3-10.3c-0.1-5.7,4.6-10.3,10.3-10.3c5.7,0,10.3,4.6,10.3,10.3C66.2,61.8,61.6,66.4,55.9,66.4z">
                            </path>
                            <path fill="#FFFFFF"
                                d="M74.3,33.5c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S76.6,33.5,74.3,33.5z">
                            </path>
                            <path fill="#FFFFFF"
                                d="M73.1,21.3H38.6c-9.7,0-17.5,7.9-17.5,17.5v34.5c0,9.7,7.9,17.6,17.5,17.6h34.5c9.7,0,17.5-7.9,17.5-17.5V38.8C90.6,29.1,82.7,21.3,73.1,21.3z M83,73.3c0,5.5-4.5,9.9-9.9,9.9H38.6c-5.5,0-9.9-4.5-9.9-9.9V38.8c0-5.5,4.5-9.9,9.9-9.9h34.5c5.5,0,9.9,4.5,9.9,9.9V73.3z">
                            </path>
                        </svg>
                    </span>
                </a>

                <!--Social icon box end-->
            </div>

            <!--Copyright line-->
            <p class="u-align-center u-text u-text-palette-2-light-3 u-text-1">© 2023 · MIS205 GRUOP2 · All Rights
                Reserved</p>

            <!--Footer div end-->
        </div>

        <!--Footer end-->
    </footer>



</body>

</html>
<script>
    
function add_like(dId) {
    $("#likebtn"+dId).attr('disabled', true);
    $.get("./addlike.php", { dId: dId }, function(data) {
        $("#like_num"+dId).html(data);
        
    });

}
</script>