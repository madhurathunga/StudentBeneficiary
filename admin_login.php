<?php
 session_start();
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

    <title>Admin Login Form | SBS </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Student Beneficiary System</h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="" method="post">
            <h1>Admin Login Form</h1>

            <div>
                <input type="text" name="username" class="form-control" placeholder="Enter Username or Email Id" required=""/>
            </div>
            <div>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required=""/>
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="submit1" value="Login">
                <a class="reset_pass" href="aforgotpassword.php">Lost your password?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">New to site?
                    <a href="admin_registration.php"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br/>


            </div>
        </form>
    </section>


</div>
<?php
if(isset($_POST['submit1'])){
    $count1=0;
    $res1=mysqli_query($link,"select *from admin_register where (username='$_POST[username]') or (email='$_POST[username]')");
    $count1=mysqli_num_rows($res1);
    $row=mysqli_fetch_array($res1);
    if($count1==1){
            if($row["password"]!=$_POST['password']){
                ?>
                <div class="alert alert-danger col-lg-6 col-lg-push-3">
                    <strong style="color:white">Invalid</strong> Username Or Password.
                    <div class="clearfix"></div>
                </div>
                <?php
            }
            elseif($row["approval"]==0){
                ?>
                <script type="text/javascript">
                    alert("If you have created an account,wait for the email stating 'Admin approved your account'");
                    window.location="home.php";
                </script>
                <?php
            }
            else{
                $_SESSION["username"]=$row['username'];
                $res2=mysqli_query($link,"select * from admin where username='$row[username]'");
                $count2=mysqli_num_rows($res2);
                if($count2==0){
                    ?>
                    <script type="text/javascript">
                        window.location="admin_details.php";
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script type="text/javascript">
                        window.location="admin_approve.php";
                    </script>
                    <?php
                }
            }
    }
    else{
        ?>
        <script type="text/javascript">
            alert("Not a registered user!");
            window.location="admin_registration.php";
        </script>
        <?php  
    }
}

?>



</body>
</html>
