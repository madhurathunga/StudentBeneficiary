<?php
session_start();
include "connection.php";
$res19=mysqli_query($link,"select username from admin_register where username='$_SESSION[username]'");
$count19=mysqli_num_rows($res19);
if(!isset($_SESSION["username"]) || ($count19==0)){
    ?>
    <script type="text/javascript">
       window.location="admin_login.php";
   </script>
   <?php
}
$id=$_GET["id"];
mysqli_query($link,"update admin_register set approval=0 where username ='$id'");
?>
<script type="text/javascript">
    alert("Admin disapproved successfully");
    window.location="adminlist.php";
</script>