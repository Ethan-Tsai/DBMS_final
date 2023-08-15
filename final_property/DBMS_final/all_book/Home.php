<?php
session_start();
?>
<?php
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

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <title>Book</title>
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
    <script src="./sort.js"></script>
    <!--css-->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./theme.min.css">


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
                        href="#">
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
                                href="Home.php" style="padding: 14px;">Book</a></li>
                        <li class="u-nav-item"><a
                                class="u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-2-light-1 u-text-black u-text-hover-palette-2-light-2"
                                href="../all_course/Home.php" style="padding: 14px;">Course</a></li>
                    </ul>
                </div>

                <div class="u-custom-menu u-nav-container-collapse">
                    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                        <div class="u-inner-container-layout u-sidenav-overflow">
                            <div class="u-menu-close"></div>
                            <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="../Home.php">Home</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.php">Book</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="Course.html">Course</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                </div>

            </nav>

            <a href="../Home.php" class="u-image u-logo u-image-1" data-image-width="80" data-image-height="40"
                title="Home">
                <img src="../img/logo.png" class="u-logo-image u-logo-image-1">
            </a>

<!-- 多一個0在這裡 -->
            <?php
            if (isset($user)): 
            ?>
            
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

    <!--cover-->
    <section class="u-clearfix u-image u-section-1" id="carousel_b61e" data-image-width="728" data-image-height="534">
        <div class="u-clearfix u-sheet u-sheet-1">
            <div class="u-container-style u-group u-shape-rectangle u-white u-group-1">
                <div class="u-container-layout u-container-layout-1">
                    <h2 class="u-align-left u-text u-text-1"> Get your books. </h2>
                    <h4 class="u-align-left u-text u-text-2"> <a href="#search"
                            class="u-align-left u-border-2 u-border-palette-2-base u-btn u-btn-round u-button-style u-palette-2-base u-radius-50 u-btn-1">SEARCH
                            !</a><br>
                        <br>
                        <br>
                        or
                    </h4>
                    <!-- <a href="#search"
                        class="u-align-left u-border-2 u-border-palette-2-base u-btn u-btn-round u-button-style u-palette-2-base u-radius-50 u-btn-1">SEARCH
                        !</a> -->
                    <div>
                        <p>
                            <a href="../add_function/add_book.php">
                                <img src="../img/book/sell.png" alt="" width="130px" id="close">
                                SELL your books!
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--END_cover-->





    <!--search-->
    <hr>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        ?>


        <form action="#search" method="post">

            <div id="search">
                <!-- <img src="../img/book/bookcase.png" alt="bookcase" style="height:300px"> -->
                <h3>What kind of books are you looking for? <br><br><span>Search in here!</span></h3>
                <div class="search-container">

                    書名:
                    <input type="bookname" name="bookname" placeholder="Search..." class="search-inpt">

                </div>
                <div>
                    <button class="btn-wishlist btn-sm" type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-search" width="25" height="25" viewBox="0 0 27 27"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                            <path d="M21 21l-6 -6"></path>
                        </svg>
                    </button>
                    <!-- <button type="" style="margin-right: 2px;">
                    <img src="./search.png" alt="" width="50px">
                </button> -->

                </div>
                <div id="filter">
                    <img src="./images/filter.png" alt="" width="40px" height="40px">
                </div>
            </div>

            <div class="detail">
                <hr>
                <div>
                    授課單位:
                    <select class="form-select form-select-lg mb-12" aria-label=".form-select-lg example" name="dep"
                        id="dep">
                        <option selected>Open this select menu</option>
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
                <div>
                    課名: <input type="text" name="course_name" placeholder="Search..." class="search-input">
                </div>
                <div>
                    關鍵字: <input type="text" name="key" placeholder="Search..." class="search-input">
                </div>

                <div id="close">
                    <img src="./images/up.png" alt="" width="30px">
                </div>

            </div>

        </form>


        <!--END_search-->

        <div id="button-container">

            <div>
                <button id="read-more-btn" onclick="defaultsort()">latest</button>
            </div>
            <div>
                <button id="read-more-btn" onclick="sortlike()">low price</button>
            </div>

        </div>
        <!--browse_book-->

        <div id="browse_book">
            <div class="row mx-n2">


                <?php
                $sql = $db->query("SELECT *FROM`book` as `b` LEFT JOIN `member` as `m` ON b.mid=m.mid ORDER BY `update_time`DESC"); //change user here
                $num = 0;

                foreach ($sql as $row) {

                    if ($num % 4 == 0) {
                        ?>
                        <img src="../img/book/col.jpg" alt="" style="padding-bottom: 50px; height:100px">
                        <hr>
                        <?php
                    } ?>


                    <div class="col-lg-3 col-md-4 col-sm-5 px-2 mb-grid-gutter">
                        <!-- Product-->
                        <div class="card product-card-alt">
                            <div class="product-thumb">
                                <!-- <button class="btn-wishlist btn-sm" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg></button> -->
                                <div class="product-card-actions">
                                    <a class="btn btn-light btn-icon btn-shadow fs-base mx-2"
                                        href="./book_detail.php?book_name=<?= $row['bookname'] ?>&mId=<?= $row["mId"] ?>">詳細資料</a>
                                    <!-- <button class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="button"><i
                                    class="ci-cart"></i>
                            </button> -->

                                </div><a class="product-thumb-overlay"
                                    href="./book_detail.php?book_name=<?= $row['bookname'] ?>& mId=<?= $row["mId"] ?>"></a><img
                                    src="<?= $row['picture'] ?>" alt="Product">
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                    <div class="text-muted fs-xs me-1">
                                        <?= $row['dep'] ?><a class="product-meta fw-medium" href="#"></a> <a
                                            class="product-meta fw-medium" href="#"></a>
                                    </div>
                                    <hr>
                                    <!-- <div class="star-rating">
                    <i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i>
                  </div> -->
                                    <h5><small>Date: </small><em>
                                            <?= $row['update_time'] ?>
                                        </em> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg></h5>

                                  

                                </div>
                                <h2 class="product-title fs-sm mb-2"><a href="marketplace-single.html" style="font-size:28px">
                                        <hr>
                                        <?= $row['bookname'] ?>
                                        <hr>
                                    </a></h2>
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="fs-sm me-2">
                                        <!-- <i class="ci-download text-muted me-1"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                            class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <span class="fs-xs ms-1">
                                            <?= $row['state'] ?>
                                        </span>
                                    </div>
                                    <div class="bg-faded-accent text-accent rounded-1 py-1 px-2">
                                        <?= $row['price'] ?><small>.00</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <?php


                    $num++;
                }
                ?>
                <img src="../img/book/col.jpg" alt="" style="padding-bottom: 50px; height:100px">
            </div>

        </div>

        <!--ENDbrowse_book-->
        <?php
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

        ?>

        

        <form action="" method="post">

            <div id="search">

                <h3>Try to search here?</h3>
                <div class="search-container">
                    <label for="bookname">書名: </label>
                    <input type="bookname" name="bookname" placeholder="Search..." class="search-input">

                </div>
                <div>
                    <button class="btn-wishlist btn-sm" type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-search" width="25" height="25" viewBox="0 0 27 27"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                            <path d="M21 21l-6 -6"></path>
                        </svg>
                    </button>
                    <!-- <button type="submit" style="margin-right: 50px;">
                    <img src="./images/sear.png" alt="" width="50px">
                </button> -->

                </div>
                <div id="filter">
                    <img src="./images/filter.png" alt="" width="40px" height="40px">
                </div>
                <button onclick="clear_sear()" style="width:60px;">reset search</button>
            </div>

            <div class="detail">

                <div>
                    授課單位:
                    <select class="form-select form-select-lg mb-12" aria-label=".form-select-lg example" name="dep"
                        id="dep">
                        <option selected>Open this select menu</option>
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
                <div>
                    課名: <input type="text" name="course_name" placeholder="Search..." class="search-input">
                </div>
                <div>
                    關鍵字: <input type="text" name="key" placeholder="Search..." class="search-input">
                </div>
                <div id="close">
                    <img src="./images/up.png" alt="" width="30px">
                </div>
                

            </div>
        </form>
        
        <hr>
        <!--END_search-->




<!-- 
        <div style="display:flex;">

            <div>
                <button id="sort1" onclick="defaultsort()">latest</button>
            </div>
            <div>
                <button id="sort2" onclick="sortlike()">low price</button>
            </div>

        </div> -->


        <!--browse_book-->

        <div id="browse_book">
            <div class="row mx-n2" id="after_sear">
                <?php



                $bookname = $_POST["bookname"];
                if ($_POST["dep"] != "Open this select menu") {
                    $dep = $_POST["dep"];
                } else {
                    $dep = "";
                }

                // as `b` JOIN `member` as `m` ON b.mid=m.mid 
                $sql = $db->query("SELECT *FROM`book` as `b` LEFT JOIN `member` as `m` ON b.mid=m.mid 
                WHERE `dep`LIKE '%$dep' AND `bookname`LIKE '%$bookname%' ORDER BY `update_time`"); //change user here
                $num = 0;
                foreach ($sql as $row) {
                    if ($num % 4 == 0) {
                        ?>
                        <img src="../img/book/col.jpg" alt="" style="padding-bottom: 50px; height:100px">
                        <hr>
                        <?php
                    } ?>

                    <div class="col-lg-3 col-md-4 col-sm-5 px-2 mb-grid-gutter">
                        <!-- Product-->
                        <div class="card product-card-alt">
                            <div class="product-thumb">
                                <!-- <button class="btn-wishlist btn-sm" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg></button> -->
                                <div class="product-card-actions">
                                    <a class="btn btn-light btn-icon btn-shadow fs-base mx-2"
                                        href="./book_detail.php?book_name=<?= $row['bookname'] ?>&mId=<?= $row["mId"] ?>">詳細資料</a>
                                    <!-- <button class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="button"><i
                                    class="ci-cart"></i>
                            </button> -->

                                </div><a class="product-thumb-overlay"
                                    href="./book_detail.php?book_name=<?= $row['bookname'] ?>& mId=<?= $row["mId"] ?>"></a><img
                                    src="<?= $row['picture'] ?>" alt="Product">
                                    
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                    <div class="text-muted fs-xs me-1">
                                        <?= $row['dep'] ?><a class="product-meta fw-medium" href="#"></a> <a
                                            class="product-meta fw-medium" href="#"></a>
                                    </div>
                                    <hr>
                                    <!-- <div class="star-rating">
                    <i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i>
                  </div> -->
                                    <h5><small>Date: </small><em>
                                            <?= $row['update_time'] ?>
                                        </em> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg></h5>

                                  

                                </div>
                                <h2 class="product-title fs-sm mb-2"><a href="marketplace-single.html" style="font-size:28px">
                                        <hr>
                                        <?= $row['bookname'] ?>
                                        <hr>
                                    </a></h2>
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="fs-sm me-2">
                                        <!-- <i class="ci-download text-muted me-1"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                            class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <span class="fs-xs ms-1">
                                            <?= $row['state'] ?>
                                        </span>
                                    </div>
                                    <div class="bg-faded-accent text-accent rounded-1 py-1 px-2">
                                        <?= $row['price'] ?><small>.00</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php


                    $num++;
                }
                ?>
                <img src="../img/book/col.jpg" alt="" style="padding-bottom: 50px; height:100px">
            </div>

        </div>



        </div>
        <!--ENDbrowse_book-->
    <?php } ?>


    <!---->

    <section class="u-align-center u-clearfix u-container-align-center u-section-5" id="sec-0b3f"
        style="background-color: var(--sup_color);">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <h2 class="u-align-center u-text u-text-default u-text-1">You may like?
                <hr style="border: 1px solid black;">
            </h2>

            <p class="u-align-center u-text u-text-2">Sample text. Click to select the text box. Click again or double
                click to start editing the text.</p>
            <div class="u-expanded-width u-gallery u-layout-grid u-lightbox u-show-text-on-hover u-gallery-1">
                <div class="u-gallery-inner u-gallery-inner-1">
                    <div class="u-effect-fade u-effect-hover-zoom u-gallery-item">
                        <div class="u-back-slide" data-image-width="1380" data-image-height="920">
                            <img class="u-back-image u-expanded" src="images/book3.jpg" alt="Sample Headline">

                        </div>

                        <div class="u-over-slide u-shading u-over-slide-1">
                            <h3 class="u-gallery-heading">Sample Headline</h3>
                            <p class="u-gallery-text">sample text</p>
                        </div>

                    </div>
                    <div class="u-effect-fade u-effect-hover-zoom u-gallery-item">
                        <div class="u-back-slide" data-image-width="1480" data-image-height="833">
                            <img class="u-back-image u-expanded" src="images/book2.jpg" alt="Sample Headline">
                        </div>
                        <div class="u-over-slide u-shading u-over-slide-2">
                            <h3 class="u-gallery-heading">Sample Headline</h3>
                            <p class="u-gallery-text">sample text</p>
                        </div>
                    </div>
                    <div class="u-effect-fade u-effect-hover-zoom u-gallery-item">
                        <div class="u-back-slide" data-image-width="740" data-image-height="833">
                            <img class="u-back-image u-expanded" src="images/book1.jpg" alt="Sample Headline">
                        </div>
                        <div class="u-over-slide u-shading u-over-slide-3">
                            <h3 class="u-gallery-heading">Sample Headline</h3>
                            <p class="u-gallery-text">sample text</p>
                        </div>
                    </div>

                </div>
            </div>

            <a href="https://nicepage.com/one-page-template"
                class="u-align-center u-border-2 u-border-palette-2-base u-btn u-btn-round u-button-style u-palette-2-base u-radius-50 u-btn-2">Show
                more</a>
        </div>
    </section>


    <!--selection-->
    <section class="skrollable skrollable-between u-align-center  u-clearfix u-container-align-center u-section-4"
        src="" style="background-color:whitesmoke;">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <h1 class="u-align-center u-text u-text-default u-text-1">Picks of the month.
                <hr style="border: 1px solid black;">
            </h1>

            <div class="u-expanded-width u-list u-list-1">
                <div class="u-repeater u-repeater-1" id="selectof_mon">

                    <div>
                        <p>Top 1</p>
                        <hr>
                        <a href="">
                            <img src="./images/book1.jpg" alt="" width="300px">
                        </a>
                        <hr>
                        <div>
                            <p>資料庫
                                <em>330</em>
                            </p>
                        </div>
                    </div>
                    <div>
                        <p>Top 2</p>
                        <hr>
                        <a href="">
                            <img src="./images/book2.jpg" alt="" width="300px">
                        </a>
                        <hr>
                        <div>
                            <p>管理資訊系統
                                <em>330</em>
                            </p>

                        </div>
                    </div>
                    <div>
                        <p>Top 3</p>
                        <hr>
                        <a href="">
                            <img src="./images/book3.jpg" alt="" width="300px">
                        </a>
                        <hr>
                        <div>
                            <p>資料探勘
                                <em>330</em>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END_selection-->

    <!--Footer starts-->
    <footer class="u-align-center-md u-align-center-sm u-align-center-xs u-clearfix u-footer u-palette-2-dark-2"
        id="sec-b7f2">

        <!--Footer div start-->
        <div class="u-clearfix u-sheet u-sheet-1">

            <!--Footer nav start-->
            <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
                <div class="menu-collapse" style="font-size: 1.75rem;">
                    <a class="u-button-style u-custom-text-color u-custom-text-hover-color u-nav-link" href="#">
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
                                href="Home.html" style="padding: 10px 18px;">Home</a></li>
                        <li class="u-nav-item"><a
                                class="u-button-style u-nav-link u-text-hover-palette-2-light-2 u-text-palette-2-dark-3"
                                href="Book.html" style="padding: 10px 18px;">Book</a></li>
                        <li class="u-nav-item"><a
                                class="u-button-style u-nav-link u-text-hover-palette-2-light-2 u-text-palette-2-dark-3"
                                href="Course.html" style="padding: 10px 18px;">Course</a></li>
                        <li class="u-nav-item"><a
                                class="u-button-style u-nav-link u-text-hover-palette-2-light-2 u-text-palette-2-dark-3"
                                href="Login.php" style="padding: 10px 18px;">Login</a></li>
                    </ul>
                </div>

                <div class="u-custom-menu u-nav-container-collapse">
                    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                        <div class="u-inner-container-layout u-sidenav-overflow">
                            <div class="u-menu-close"></div>
                            <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.html">Home</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Book.html">Book</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="Course.html">Course</a></li>
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
            <a href="Home.php" class="u-image u-logo u-image-1" data-image-width="80" data-image-height="40">
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
            <p class="u-align-center u-text u-text-palette-2-light-3 u-text-1">© 2023 · ???. All Rights Reserved</p>

            <!--Footer div end-->
        </div>

        <!--Footer end-->
    </footer>



</body>

</html>