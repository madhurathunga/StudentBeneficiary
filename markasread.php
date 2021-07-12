<?php
session_start();
include "connection.php";
$res19=mysqli_query($link,"select username from student_register where username='$_SESSION[username]'");
$count19=mysqli_num_rows($res19);
if(!isset($_SESSION["username"]) || ($count19==0)){
    ?>
    <script type="text/javascript">
       window.location="student_login.php";
   </script>
   <?php
}
$id=$_GET["id"];
mysqli_query($link,"update notification set read1=1 where id =$id");
$res40=mysqli_query($link,"select * from notification where id =$id");
$row40=mysqli_fetch_array($res40);
if($row40['busername']==$_SESSION['username']){
    ?>
    <script type="text/javascript">
        window.location="wishlist_books.php";
    </script>
    <?php
}
else{
    ?>
    <script type="text/javascript">
        window.location="sold_book_status.php";
    </script>
    <?php
}
?>