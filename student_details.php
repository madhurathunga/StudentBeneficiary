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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Details Form | SBS </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Student Beneficiary System</h1>
</div>
<body class="login" style="margin-top: -20px;">
    <div class="login_wrapper">
        <section class="login_content" style="margin-top: -40px;">
            <form name="form2" action="" method="post">
                    <h2>Details Form</h2><br>
                    
                    <div>
                        <input type="text" class="form-control" placeholder="Enter USN" name="usn" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Enter firstName" name="firstname" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Enter lastName" name="lastname"/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Enter house name" name="housename" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Enter street name" name="streetname" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Enter city" name="city" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Enter district" name="district" required=""/>
                    </div>
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-default submit " type="submit" name="submit1" value="Submit">
                    </div>

                </form>
                </section>
            <?php
            if(isset($_POST["submit1"]))
            {
                    mysqli_query($link,"insert into student (username,usn,fname,lname,housename,streetname,city,district) values ('$_SESSION[username]','$_POST[usn]','$_POST[firstname]','$_POST[lastname]','$_POST[housename]','$_POST[streetname]','$_POST[city]','$_POST[district]')");
                    ?>
                    <script type="text/javascript">
                        alert("Student details form filled successfully");
                        window.location="notifications.php";
                    </script>
                    <?php
            }

            ?>
            

    </div>

   

</body>
</html>
