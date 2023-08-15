<?php
require_once 'course_connection.php';
$sql = "SELECT * FROM description ORDER BY dId DESC LIMIT 5";
$stmt = $conn->query($sql);
$all_description = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Course</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="popup.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boltcss/bolt.min.css">
</head>

<body>

    <main>

        <!-- Search box start -->
        <form method="post" id="search_section">
            <span class="search_instruction">Search Course</span>
            <input type="text" name="search">
            <input type="submit" name="submit">
        </form>
        <!-- Search box end -->

        <!-- Search function start -->
        <?php
        $con = new PDO("mysql:host=localhost;dbname=dbms_final", 'root', '');
        if (isset($_POST["submit"])) {
            $str = $_POST["search"];
            $sth = $con->prepare("SELECT * FROM `description` WHERE course_name LIKE CONCAT('%', :course_name, '%')");
            $sth->bindParam(':course_name', $str);
            $sth->setFetchMode(PDO::FETCH_OBJ);
            $sth->execute();

            $resultCount = $sth->rowCount();

            if ($resultCount > 0){
                while($row = $sth->fetch()){?>
                <div class="card" id="card">
                    <div class="caption">
                        <div id="course_name"><b><?php echo $row->course_name; ?></b> <?php echo $row->course_id; ?></div>

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
                        <div>"<?php echo $row->content; ?>"</div>
                    </div>
                </div>
            <?php
                }
            }else{
                echo "No course review found";
            }
        }?>
        <!-- Search Function End -->



    <!-- default display from database -->
    <?php foreach($all_description as $row) { ?>
        <div class="card" id="card">
            <div class="caption">
                <div id="course_name"><b><?php echo $row["course_name"]; ?></b> <?php echo $row["course_id"]; ?></div>
                
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
                <div>"<?php echo $row["content"];?>"</div>
            </div>
        </div>
    <?php } ?>
    <!-- default display from database end -->
    </main>
    
    <!-- form start -->
    <div class="container" id="blur">
        
        <div class="post-btn-position">
            <button id="add-btn" class="post-btn-design">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M8 20l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4h4z"></path>
            <path d="M13.5 6.5l4 4"></path>
            <path d="M16 18h4m-2 -2v4"></path>
            </svg>
            </button>
        </div>

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
                        <select name="coolness" id="coolness" >
                            <option value=""> </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>

                <div class="form-element">
                    <label for="description">Course Description</label>
                    <textarea name="description" id="description" cols="100" rows="5"
                        placeholder="Enter course description"></textarea>
                </div>

                <!-- <div><input type="hidden" value="<php?=$mid?>" name="mid"></div> -->

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

</body>



</html>

