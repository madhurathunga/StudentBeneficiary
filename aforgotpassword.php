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

    <title>Student Beneficiary System</title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-book"></i> <span>SBS</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                    </div>
                    <div class="profile_info">
                        <span></span>

                        <h2></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>GENERAL</h3>
                        <ul class="nav side-menu">
                            <li><a href="home.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron"></span></a>
                            
                            </li>
                            <li><a href="about_us.php"><i class="fa fa-info-circle"></i> About Us <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="contact.php"><i class="fa fa-mobile-phone"></i> Contact <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="admin_login.php"><i class="fa fa-sign-in"></i> Admin Login <span class="fa fa-chevron"></span></a>

                            </li>
			    <li><a href="student_login.php"><i class="fa fa-sign-in"></i> Student Login <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="student_registration.php"><i class="fa fa-user"></i> Student Registration <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="admin_registration.php"><i class="fa fa-user"></i> Admin Registration <span class="fa fa-chevron"></span></a>

                            </li>

                        </ul>
                    </div>


                </div>

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                
                </nav>
            </div>
        </div>
        <!-- /top navigation -->


        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                
                    <span class="input-group-btn">
                      
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h1>Forgot password</h1>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                            <input type="email"class="form-control" placeholder="Enter email Id" name="email" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="submit"  name="submit1" class="btn btn-default submit" value="Send mail" style="background-color: blue; color:white"></td>
                                        </tr>
                                    </table> 
                                    <h5 style="color:red">Note : Password will be sent to the above mail id,Enter a mail id used while registering</h5>        
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </div>
        <!-- /page content -->
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
$n=10; 
function getName($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 
$pass=getName($n);
if(isset($_POST["submit1"]))
{ 
    $res1=mysqli_query($link,"select * from admin_register where email='$_POST[email]'");
    $count1=mysqli_num_rows($res1);
    if($count1>0){
        $row1=mysqli_fetch_array($res1);
        $res7=mysqli_query($link,"select * from admin where username='$row1[username]'");
        $count7 = mysqli_num_rows($res7);
        mysqli_query($link,"update admin_register set password='$pass' where email='$_POST[email]'");
        mysqli_query($link,"update admin_register set confirmpasswd='$pass' where email='$_POST[email]'");
        if($count7>0){
            $row7=mysqli_fetch_array($res7);
            $name = $row7['fname']." ".$row7['lname'];
        }
        else{
            $name = $row1['username'];
        }
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPDebug  = 1;  
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "ssl";
        $mail->Port       = 465;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = "studentbeneficiaryresource@gmail.com";
        $mail->Password   = "sbs2020Yo";
        $to = $_POST['email'];
        $mail->IsHTML(true);
        $mail->AddAddress($to, $name);
        $mail->SetFrom("studentbeneficiaryresource@gmail.com", "Student Beneficiary");
        $mail->Subject = "Password for login";
        $content = "
        <html>
        <head>
        <title>STUDENT BENEFICIARY RESOURCE SYSTEM</title>
        </head>
        <body>
        <h3>Hi $name,use the password $pass for login</h3>
        <h4>Go back to the login page and enter the credentials</h4>
        <h3 style='color:purple'>With best regards,Student beneficiary resource team</h3>
        <p style='color:red'>Note : This is a system generated message!</p>
        </body>
        </html>
        ";

        $mail->MsgHTML($content); 
        if(!$mail->Send()) {
            alert("Couldn't send mail!Invalid email Id");
            var_dump($mail);
        } else {
            ?><script type="text/javascript">
            alert("Email sent successfully!Login with the password sent to the mail");
            window.location="admin_login.php";
            </script>
            <?php
        }
    }
    else{
        ?><script type="text/javascript">
        alert("Email Id not registered!");
        window.location="admin_registration.php";
        </script>
        <?php
    }
}
?>
<?php
include "footer.php";
?>