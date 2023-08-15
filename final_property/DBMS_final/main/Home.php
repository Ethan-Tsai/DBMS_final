<?php
session_start();
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

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



<!--head start-->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​Book your outdoor adventure, About Us, ​Find your next getaway, Our Services, ​Plan Your Camping Trip, ​How to plan a camping trip, Contact Us">
    <meta name="description" content="">
    <title>Home</title>
    <link rel="stylesheet" href="new_nicepage.css" media="screen">
    <link rel="stylesheet" href="Home.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.9.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Lato:100,100i,300,300i,400,400i,700,700i,900,900i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/default-logo-7.png",
		"sameAs": []
    }</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
    <meta data-intl-tel-input-cdn-path="intlTelInput/">
  <!--Head end-->
  </head>

  <!--Body start-->
  <body class="u-body u-xl-mode" data-lang="en">

    <!--Header start-->
    <header class="u-clearfix u-header u-sticky u-sticky-e1a4 u-white u-header" id="sec-c67f" style="background-color:#5a5344;">

      <!--Header div start-->
      <div class="u-clearfix u-sheet u-sheet-1">

        <!--navbar start-->  
        <nav class="u-align-center u-menu u-menu-one-level u-offcanvas u-menu-1" data-responsive-from="MD">
          
        <div class="menu-collapse" style="font-size: 1.5rem; letter-spacing: 0px; font-weight: 700;">
          <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
            <svg class="u-svg-link" viewBox="0 0 24 24">
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
            </svg>
            <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
              <g>
                <rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect>
                <rect y="13" width="16" height="2"></rect>
              </g>
            </svg>
          </a>
        </div>

          <!--Navbar menu start-->
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-spacing-20 u-unstyled u-nav-1">
              <li class="u-nav-item"><a class="u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-2-base u-text-black u-text-hover-palette-2-light-2" href="Home.php" style="padding: 10px;">Home</a></li>
              <li class="u-nav-item"><a class="u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-2-base u-text-black u-text-hover-palette-2-light-2" href="../all_book/Home.php" style="padding: 10px;">Book</a></li>
              <li class="u-nav-item"><a class="u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-2-base u-text-black u-text-hover-palette-2-light-2" href="../all_course/Home.php" style="padding: 10px;">Course</a></li>
            </ul>
          </div>
          <!--Navbar menu end-->

          <!--Collapse menu start-->
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.php">Home</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="../all_book/Home.php">Book</a> 
                  </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="../all_course/Home.php">Course</a></li>
                </ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          <!--Collapse menu end-->
          </div>

        <!--Navbar end-->
        </nav>


        <!--Logo link-->
        <a href="Home.php" class="u-image u-logo u-image-1">
          <img src="../img/logo.png" class="u-logo-image u-logo-image-1">
        </a>

        <!--Login link-->
        <?php 
        if (isset($user)):?>
          <a href="logout.php" class="u-align-right u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-hover-feature u-none u-text-hover-palette-2-base u-btn-1" onclick="return confirm('Are you sure you want to Log out？')">
          Logout
          </a>
          <?php
              $mId = $_SESSION["user_id"];
              $get_member_profile = $db->query("SELECT * FROM member where mId = $mId");
              foreach ($get_member_profile as $profile) {
                 $member_image = $profile["image"];
              }
          ?>
          <a href="../profile/profile.php" class="member-photo" id="member-photo">
            <!-- profile photo -->
            <img src="<?= $member_image ?>" alt="12356">
          </a>

        <?php else:?>
          <a href="login_function.php" class="u-align-right u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-hover-feature u-none u-text-hover-palette-2-base u-btn-1">
            Login&nbsp;
          <span class="u-file-icon u-icon u-opacity u-opacity-85 u-text-black u-icon-1">
            <img src="images/2.png" alt="">
          </span>
        </a>

        <?php endif; ?>

      <!--Header div end-->
      </div>
  
    <!--Header end-->
    </header>
    
    <!--Content start-->
    <section class="skrollable skrollable-between u-align-center u-clearfix u-container-align-center-md u-container-align-center-sm u-container-align-center-xs u-image u-shading u-section-1" src="" id="sec-804d" data-image-width="1280" data-image-height="853">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-text u-text-default u-text-1" data-animation-name="customAnimationIn" data-animation-duration="2000" data-animation-delay="0">Find New Knowledge In Old Books</h1>
        <div class="u-border-3 u-border-white u-line u-line-horizontal u-line-1" data-animation-name="customAnimationIn" data-animation-duration="2000" data-animation-delay="0" data-animation-direction="X"></div>
        <p class="u-large-text u-text u-text-variant u-text-2" data-animation-name="customAnimationIn" data-animation-duration="2000" data-animation-delay="1000" data-animation-out="1" data-animation-direction="X">&nbsp;Our platform is a treasure trove of knowledge waiting to be discovered.&nbsp;<br>Browse our virtual shelves and find your next adventure&nbsp;at a fraction of&nbsp; cost!<br>
        </p>
        <div class="u-clearfix u-layout-custom-sm u-layout-custom-xs u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-align-right u-container-style u-layout-cell u-left-cell u-size-30 u-layout-cell-1" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="250">
                <div class="u-container-layout u-container-layout-1">
                  <a href="../all_book/Home.php" class="u-border-2 u-border-hover-grey-50 u-border-palette-2-base u-btn u-btn-round u-button-style u-palette-2-base u-radius-50 u-btn-1" data-animation-name="customAnimationIn" data-animation-duration="2000" data-animation-delay="1500">GO shopping</a>
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-30 u-layout-cell-2" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="250">
                <div class="u-container-layout u-container-layout-2">
                  <a href="../all_course/Home.php" class="u-active-white u-border-2 u-border-active-white u-border-hover-white u-border-white u-btn u-btn-round u-button-style u-hover-white u-none u-radius-50 u-text-active-black u-text-hover-black u-btn-2" data-animation-name="customAnimationIn" data-animation-duration="2000" data-animation-delay="1500">See cOurseS</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-section-2" id="carousel_eee5">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-align-center u-container-style u-expanded-width u-group u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h2 class="u-text u-text-black u-text-1" data-animation-name="customAnimationIn" data-animation-duration="4000" data-animation-delay="0" data-animation-direction="">MEET OUR TEAM </h2>
            <div class="u-border-3 u-border-grey-dark-1 u-line u-line-horizontal u-line-1"></div>
          </div>
        </div>
        <div class="u-clearfix u-gutter-0 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-align-center u-container-style u-layout-cell u-left-cell u-size-24-lg u-size-24-xl u-size-60-md u-size-60-sm u-size-60-xs u-layout-cell-1">
                <div class="u-container-layout u-valign-middle u-container-layout-2">
                  <div alt="" class="u-align-center u-border-5 u-border-palette-2-base u-image u-image-circle u-preserve-proportions u-image-1" src="" data-image-width="740" data-image-height="1110" data-animation-name="customAnimationIn" data-animation-duration="3000" data-animation-delay="0"></div>
                </div>
              </div>
              <div class="u-align-left u-container-align-center-md u-container-align-center-sm u-container-align-center-xs u-container-style u-layout-cell u-right-cell u-size-36-lg u-size-36-xl u-size-60-md u-size-60-sm u-size-60-xs u-layout-cell-2" data-animation-name="customAnimationIn" data-animation-duration="1500">
                <div class="u-container-layout u-container-layout-3">
                  <h3 class="u-text u-text-2" data-animation-name="customAnimationIn" data-animation-duration="3000" data-animation-direction="">CHIEN YU, LIU</h3>
                  <p class="u-text u-text-3" data-animation-name="customAnimationIn" data-animation-duration="3000">Paragraph. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id suscipit ex. Suspendisse rhoncus laoreet purus quis elementum. Phasellus sed efficitur dolor, et ultricies sapien. Quisque fringilla sit amet dolor commodo efficitur. Aliquam et sem odio. In ullamcorper nisi nunc, et molestie ipsum iaculis sit amet.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-2">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-36 u-layout-cell-3">
                <div class="u-container-layout u-container-layout-4">
                  <h3 class="u-text u-text-4" data-animation-name="customAnimationIn" data-animation-duration="3000" data-animation-delay="2000" data-animation-out="1" data-animation-direction="">GUAN RU, LIN </h3>
                  <p class="u-text u-text-5" data-animation-name="customAnimationIn" data-animation-duration="3000" data-animation-delay="2000" data-animation-out="1">Paragraph. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id suscipit ex. Suspendisse rhoncus laoreet purus quis elementum. Phasellus sed efficitur dolor, et ultricies sapien. Quisque fringilla sit amet dolor commodo efficitur. Aliquam et sem odio. In ullamcorper nisi nunc, et molestie ipsum iaculis sit amet.</p>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-24 u-layout-cell-4">
                <div class="u-container-layout u-valign-middle u-container-layout-5">
                  <div alt="" class="u-border-10 u-border-palette-2-base u-image u-image-circle u-image-2" src="" data-image-width="740" data-image-height="1110" data-animation-name="customAnimationIn" data-animation-duration="3000" data-animation-delay="2000" data-animation-direction="Left" data-animation-out="1"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="u-clearfix u-layout-wrap u-layout-wrap-3">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-24 u-layout-cell-5">
                <div class="u-container-layout u-valign-middle u-container-layout-6">
                  <div alt="" class="u-border-10 u-border-palette-2-base u-image u-image-circle u-image-3" src="" data-image-width="740" data-image-height="1110" data-animation-name="customAnimationIn" data-animation-duration="3000" data-animation-delay="4000"></div>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-36 u-layout-cell-6">
                <div class="u-container-layout u-container-layout-7">
                  <h3 class="u-text u-text-6" data-animation-name="customAnimationIn" data-animation-duration="3000" data-animation-delay="4000">SHANG CHEN, TSAI </h3>
                  <p class="u-text u-text-7" data-animation-name="customAnimationIn" data-animation-direction="" data-animation-duration="3000" data-animation-delay="4000">Paragraph. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id suscipit ex. Suspendisse rhoncus laoreet purus quis elementum. Phasellus sed efficitur dolor, et ultricies sapien. Quisque fringilla sit amet dolor commodo efficitur. Aliquam et sem odio. In ullamcorper nisi nunc, et molestie ipsum iaculis sit amet.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!--Content end-->
    </section>
    
    <!--Footer starts-->
    <footer class="u-align-center-md u-align-center-sm u-align-center-xs u-clearfix u-footer u-palette-2-dark-2" id="sec-b7f2">
      
      <!--Footer div start-->
      <div class="u-clearfix u-sheet u-sheet-1">
      
        <!--Footer nav start-->  
        <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1.75rem;">
            <a class="u-button-style u-custom-text-color u-custom-text-hover-color u-nav-link" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-fab7"></use>
              </svg>
              <svg class="u-svg-content" version="1.1" id="svg-fab7" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                <g>
                  <rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
                </g>
              </svg>
            </a>  
          </div>

          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1">
              <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-hover-palette-2-light-2 u-text-palette-2-dark-3" href="Home.html" style="padding: 10px 18px;">Home</a></li>
              <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-hover-palette-2-light-2 u-text-palette-2-dark-3" href="Book.html" style="padding: 10px 18px;">Book</a></li>
              <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-hover-palette-2-light-2 u-text-palette-2-dark-3" href="Course.html" style="padding: 10px 18px;">Course</a></li>
              <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-hover-palette-2-light-2 u-text-palette-2-dark-3" href="Login.php" style="padding: 10px 18px;">Login</a></li>
            </ul>
          </div>
            
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.html">Home</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Book.html">Book</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Course.html">Course</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Login.php">Login</a></li>
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
                <path fill="#FFFFFF" d="M73.5,31.6h-9.1c-1.4,0-3.6,0.8-3.6,3.9v8.5h12.6L72,58.3H60.8v40.8H43.9V58.3h-8V43.9h8v-9.2c0-6.7,3.1-17,17-17h12.5v13.9H73.5z"></path>
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
              <path fill="#FFFFFF" d="M83.8,47.3c0,0.6,0,1.2,0,1.7c0,17.7-13.5,38.2-38.2,38.2C38,87.2,31,85,25,81.2c1,0.1,2.1,0.2,3.2,0.2c6.3,0,12.1-2.1,16.7-5.7c-5.9-0.1-10.8-4-12.5-9.3c0.8,0.2,1.7,0.2,2.5,0.2c1.2,0,2.4-0.2,3.5-0.5c-6.1-1.2-10.8-6.7-10.8-13.1c0-0.1,0-0.1,0-0.2c1.8,1,3.9,1.6,6.1,1.7c-3.6-2.4-6-6.5-6-11.2c0-2.5,0.7-4.8,1.8-6.7c6.6,8.1,16.5,13.5,27.6,14c-0.2-1-0.3-2-0.3-3.1c0-7.4,6-13.4,13.4-13.4c3.9,0,7.3,1.6,9.8,4.2c3.1-0.6,5.9-1.7,8.5-3.3c-1,3.1-3.1,5.8-5.9,7.4c2.7-0.3,5.3-1,7.7-2.1C88.7,43,86.4,45.4,83.8,47.3z"></path>
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
                <path fill="#FFFFFF" d="M55.9,38.2c-9.9,0-17.9,8-17.9,17.9C38,66,46,74,55.9,74c9.9,0,17.9-8,17.9-17.9C73.8,46.2,65.8,38.2,55.9,38.2z M55.9,66.4c-5.7,0-10.3-4.6-10.3-10.3c-0.1-5.7,4.6-10.3,10.3-10.3c5.7,0,10.3,4.6,10.3,10.3C66.2,61.8,61.6,66.4,55.9,66.4z"></path><path fill="#FFFFFF" d="M74.3,33.5c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S76.6,33.5,74.3,33.5z"></path><path fill="#FFFFFF" d="M73.1,21.3H38.6c-9.7,0-17.5,7.9-17.5,17.5v34.5c0,9.7,7.9,17.6,17.5,17.6h34.5c9.7,0,17.5-7.9,17.5-17.5V38.8C90.6,29.1,82.7,21.3,73.1,21.3z M83,73.3c0,5.5-4.5,9.9-9.9,9.9H38.6c-5.5,0-9.9-4.5-9.9-9.9V38.8c0-5.5,4.5-9.9,9.9-9.9h34.5c5.5,0,9.9,4.5,9.9,9.9V73.3z"></path>
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