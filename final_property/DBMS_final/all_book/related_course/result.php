<?php
include("../../config.php");
$book_name=$_GET["book_name"];

$mId=$_GET["mId"];
$str=$_GET["str"];
$sql="INSERT INTO book_course (bookname,book_mid,course_name) VALUES('$book_name',$mId,'$str')";
$db->exec($sql);

// $sql=$db->query("SELECT * FROM book_course  WHERE `bookname`='$book_name' AND `book_mid`=$mId");
// foreach($sql as $row){

?>

<ul>
												
                        <?php
                        $sql = $db->query("SELECT * FROM book_course  WHERE `bookname`='$book_name' AND `book_mid`=$mId");
                        ?>
                        
                        <?php
                        foreach ($sql as $row) {
                          ?>
                          <form action="../all_course/Home.php" method="post">
                          
                            <li style="color:#fe696a;"><input name="submit" type="hidden" value="submit"> 
                            <input type="hidden" value="<?=$row["course_name"]?>"name="search"> <button
                                style=" border: none; margin: 0; padding: 0; width: auto; overflow: visible; background: transparent;color:#fe696a;"
                                type="submit">
                                <?= $row["course_name"] ?>
                              </button></li>
                              </form>
                            <?php
                        }
                        ?>
                        
                      </ul>