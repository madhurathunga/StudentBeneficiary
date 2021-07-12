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
$bookid=$_GET['id'];
$res=mysqli_query($link,"select * from student where username='$_SESSION[username]'");
$row=mysqli_fetch_array($res);
$res1=mysqli_query($link,"select * from student_register where username='$_SESSION[username]'");
$row1=mysqli_fetch_array($res1);
mysqli_query($link,"insert into transaction (usn,bookid,dateofbookadded,role) values ('$row[usn]',$bookid,curdate(),'buy')");
$a1=mysqli_query($link,"select username from student where usn=(select usn from transaction where bookid=$bookid and role='sell')");
$a2=mysqli_fetch_array($a1);
mysqli_query($link,"insert into notification (susername,busername,fname,lname,phoneno,email,bookid,date,message) values ('$a2[username]','$_SESSION[username]','$row[fname]','$row[lname]','$row1[phoneno]','$row1[email]',$bookid,curdate(),'Buy book')");
?>
<script type="text/javascript">
alert("Book added to wishlist");
window.location="wishlist_books.php";
</script>