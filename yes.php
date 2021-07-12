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
mysqli_query($link,"update transaction set approval=1 where (bookid = '$id' and usn in (select usn from student where username='$_SESSION[username]'))");
mysqli_query($link,"update books set sold='Yes' where bookid = '$id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <script type="text/javascript">
    function madz() {
            var content =document.getElementById("content").innerHTML;
            var a=window.open('','','height=500,width=500');
            a.document.write('<html>');
            a.document.write('<body><div>');
            a.document.write(content);
            a.document.write('</div></body></html>');
            a.document.close();
            a.print();
       }
    </script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Beneficiary System | SBS </title>
    


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
                    <div class="profile_info">
                        <span>Welcome,</span>

                        <h2><?php echo $_SESSION["username"];?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                        <li><a href="shome.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron"></span></a>
                            
                            </li>
                            <li><a href="sabout_us.php"><i class="fa fa-info-circle"></i> About Us <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="scontact.php"><i class="fa fa-mobile-phone"></i> Contact <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="sold_book_status.php"><i class="fa fa-check"></i> Sold book status <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="sold_books.php"><i class="fa fa-list-alt"></i> Sold books <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="options.php"><i class="fa fa-shopping-cart"></i> Options page <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="wishlist_books.php"><i class="fa fa-heart"></i> Wishlist <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="add_books.php"><i class="fa fa-money"></i> Sell book <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="bought_books.php"><i class="fa fa-gavel"></i> Bought books <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="pretranreport.php"><i class="fa fa-history"></i> Previous Transaction reports <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="notifications.php"><i class="fa fa-bell"></i> Notifications <span class="fa fa-chevron"></span></a>
                            </li>
                            <li><a href="changepassword.php"><i class="fa fa-key"></i> Change Password <span class="fa fa-chevron"></span></a>
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
                    

                            

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                        
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <?php $res2=mysqli_query($link,"select fname,lname from student where username='$_SESSION[username]'"); $row2=mysqli_fetch_array($res2); echo $row2["fname"]." ".$row2["lname"];?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                            
                        </li>

                        
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->


        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                
                                <p style="font-size:30px">REPORT OF TRANSACTION</a>

                                <div class="clearfix"></div>
                                
                            </div>
                            
                            <div id="content" class="x_content">
                                <?php
                                
                                $res3=mysqli_query($link,"select * from books where bookid='$id'");
                                $row3=mysqli_fetch_array($res3);
                                $res7=mysqli_query($link,"select * from course where courseid='$row3[courseid]'");
                                $row7=mysqli_fetch_array($res7);
                                $res10=mysqli_query($link,"select * from transaction where bookid='$id' and usn in (select usn from student where username='$_SESSION[username]')");
                                $row10=mysqli_fetch_array($res10);
                                $res11=mysqli_query($link,"select * from student where username='$_SESSION[username]'");
                                $row11=mysqli_fetch_array($res11);
                                $res13=mysqli_query($link,"select * from transaction where (bookid='$id' and role='sell')");
                                $row13=mysqli_fetch_array($res13);
                                $res17=mysqli_query($link,"select * from student where usn='$row13[usn]'");
                                $row17=mysqli_fetch_array($res17);
                                $res888=mysqli_query($link,"select * from student_register where username='$row17[username]'");
                                $row888=mysqli_fetch_array($res888);
                                echo "<pre>";
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>";
                                echo "<h1>"."STUDENT BENEFICIARY RESOURCE SYSTEM"."</h1>";
                                echo "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>";
                                echo "<h2>"."Date of transaction - ".$row10["dateofbookadded"]."</h2>";
                                echo "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>";
                                echo "<h2>"."Name                - ".$row11["fname"]." ".$row11["lname"]."</h2>";
                                echo "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>";
                                echo "<h2>"."Book name           - ".$row3["bookname"]."</h2>";
                                echo "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>";
                                echo "<h2>"."Book isbn           - ".$row3["bookisbn"]."</h2>";
                                echo "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>";
                                echo "<h2>"."Publication name    - ".$row3["publicationname"]."</h2>";
                                echo "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>";
                                echo "<h2>"."Author name         - ".$row3["authorname"]."</h2>";
                                echo "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>";
                                echo "<h2>"."Domain              - ".$row7["domainname"]."</h2>";
                                echo "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>";
                                echo "<h2>"."Edition             - ".$row3["edition"]."</h2>";
                                echo "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>";
                                echo "<h2>"."Paid money          - ".$row3["sellingprice"]."</h2>";
                                echo "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>";
                                echo "<h2>"."Seller Name         - ".$row17["fname"]." ".$row17["lname"]."</h2>";
                                echo "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>";
                                echo "<h2>"."USN of Seller       - ".$row17["usn"]."</h2>";
                                echo "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>";
                                echo "<h2>"."Email id of seller  -"?> <a href="mailto: <?php echo $email?>"style="color:black"><?php echo $row888["email"] ?></a><?php "</h2>";
                                echo "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>";
                                echo "<h2>"."Phone no.of seller  - ".$row888["phoneno"]."</h2>";
                                echo "</th>";
                                echo "</tr>";
                                $profit=$row3["actualprice"]-$row3["sellingprice"];
                                echo "<tr>";
                                echo "<th>";
                                echo "<h2>"."Price deducted      - Rs.".$profit."</h2>";
                                echo "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>";
                                date_default_timezone_set('Asia/Kolkata');
                                echo "<h2>"."Report generated on -" . date("Y-m-d h:i:sa") . "</h2>";
                                echo "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>";
                                echo "<h2>"."Transaction done successfully-Verified"."</h2>";
                                echo "</th>";
                                echo "</tr>";
                                echo "</table>";
                                echo "</pre>";
                                ?>
                                <pre><h4 style="color:red">Note : This is a system generated report.If any discrepancies in the transaction found,
please contact one of the admins immediately here - <a href="mailto:madhurathunga@gmail.com" style="color:purple">Madhura , </a><a href="mailto:nssamhitha@gmail.com" style="color:purple">Samhitha , </a><a href="mailto:mailto:prathyusharaikar2000@gmail.com" style="color:purple">Prathyusha , </a><a href="mailto:spoorthivinooth988@gmail.com" style="color:purple">Spoorthi</a></h4></pre>





                            </div>
                            <button id="cmd" onclick="return madz()"><i class="fa fa-download"></i>  Download Report <span class="fa fa-chevron"></span></button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
<?php
include "footer.php";
?>