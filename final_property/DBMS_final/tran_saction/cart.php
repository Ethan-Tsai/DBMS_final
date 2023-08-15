<?php
session_start();
include("../config.php");


if (isset($_SESSION["user_id"])) {    
    try {
        $db = new PDO("mysql:dbname=DBMS_final;host=localhost", "root", "");
        $sql = "SELECT * FROM user WHERE id = :user_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":user_id", $_SESSION["user_id"]);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}



$mid=$_GET["mid"];
$bookname=$_GET["book"];
$book="'$bookname'";
$user_id=$_SESSION["user_id"];

$sql = $db->query("SELECT * FROM `cart_new` WHERE `user_id` = '$user_id'AND`book_mid`=$mid AND`bookname`='$bookname'");
$n=$sql->rowCount();
$no=0;
if($n!=0){
    ?>
    <script>
        alert("此商品已在您的購物車");
        
    </script>
    <?php
}else if($n==0){

$add= "INSERT INTO cart_new VALUES ($user_id,$mid,$book)";
$db->exec($add);
?>
<script>alert("加入購物車");</script>
<?php
}

$user_id=$_SESSION["user_id"];
$sql_cart = $db->query("SELECT * FROM `cart_new` as c JOIN `book` as b ON `book_mid`= `mId` and c.bookname=b.bookname  WHERE `user_id` =$user_id");
   
  
?>
					<?php
					foreach ($sql_cart as $row_cart) { ?>
						<div class="d-flex align-items-center" style="margin-bottom:15px"><a class="d-block flex-shrink-0" href="">
              <img src="<?= $row_cart["picture"]?>" width="64" alt="Product"></a>
                            <div class="ps-2">
								<h6 class="widget-product-title"><a href=""><?= $row_cart["bookname"] ?></a></h6>
								<div class="widget-product-meta"><span class="text-accent me-2">$<?= $row_cart["price"] ?></span></div>
								<span class="text-muted"><?= $row_cart["state"]?></span>
                            </div>
                        </div>
						<?php
					}
					?>
					<button class="read-more-btn" style="margin-top:15px">BUY</button>






