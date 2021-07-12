<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Registration Form | SBS </title>

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
            <form name="form1" action="" method="post">
                <h2>User Registration Form</h2><br>
                <div>
                    <input type="text" class="form-control" placeholder="Enter username" name="username" required=""/>
                </div>
                <div>
                    <input type="email" class="form-control" placeholder="Enter email-id" name="email" required=""/>
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Enter contact" name="contact" required=""/>
                </div>
                <div>
                    <input type="password" class="form-control" placeholder="Enter password" name="password" required=""/>
                </div>
                <div>
                    <input type="password" class="form-control" placeholder="Retype password" name="confirmpasswd" required=""/>
                </div>
                <div class="col-lg-12  col-lg-push-3">
                    <input class="btn btn-default submit " type="submit" name="submit1" value="Register">
                </div>
                <div class="clearfix"></div>
                <div class="separator">
                    <p class="change_link">Already registered student?
                        <a href="student_login.php"> Login </a>
                    </p>
                    <div class="clearfix"></div>
                    <br/>
                </div>
            </form>
        </section>
            <?php
            if(isset($_POST["submit1"]))
            {
                $res40=mysqli_query($link,"select *from student_register where username='$_POST[username]'");
                $count40=mysqli_num_rows($res40);
                $res41=mysqli_query($link,"select *from student_register where email='$_POST[email]'");
                $count41=mysqli_num_rows($res41);
                if($count40>0){
                    ?>
                    <script type="text/javascript">
                    alert("Username already exists!Choose another username");
                    window.location="student_registration.php";
                    </script>
                    <?php
                }
                elseif($count41>0){
                    ?>
                    <script type="text/javascript">
                    alert("This email is already registered with the application");
                    window.location="student_login.php";
                    </script>
                    <?php
                }
                elseif($_POST['password']!=$_POST['confirmpasswd']){
                    ?>
                    <script type="text/javascript">
                    alert("Password and confirm password is not matching!");
                    window.location="student_registration.php";
                    </script>
                    <?php
                }
                else{
                    mysqli_query($link,"insert into student_register (username,email,phoneno,password,confirmpasswd) values ('$_POST[username]','$_POST[email]','$_POST[contact]','$_POST[password]','$_POST[confirmpasswd]')");
                    ?>
                    <script type="text/javascript">
                        alert("Registration successfull, You will get email when your account is approved.");
                        window.location="home.php";
                    </script>
                    <?php
                }
		    }
            ?>
        </div>
    </body>
</html>