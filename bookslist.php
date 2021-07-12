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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
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
                        <li><a href="ahome.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron"></span></a>
                            
                            </li>
                            <li><a href="aabout_us.php"><i class="fa fa-info-circle"></i> About Us <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="acontact.php"><i class="fa fa-mobile-phone"></i> Contact <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href='admin_approve.php'><i class="fa fa-check-square-o"></i> Approve/Disapprove Admin <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href='student_approve.php'><i class="fa fa-check-square"></i> Approve/Disapprove Student <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href='courselist.php'><i class="fa fa-file"></i> Courses list <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href='transactionlist.php'><i class="fa fa-exchange"></i> Transactions list <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href='adminlist.php'><i class="fa fa-user"></i> Admins list <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href='studentlist.php'><i class="fa fa-child"></i> Students list <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href='adminreport.php'><i class="fa fa-bar-chart"></i> Analysis Report <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href='achangepassword.php'><i class="fa fa-key"></i> Change Password <span class="fa fa-chevron"></span></a></li>

                            

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
                               <?php $res2=mysqli_query($link,"select fname,lname from admin where username='$_SESSION[username]'"); $row2=mysqli_fetch_array($res2); echo $row2["fname"]." ".$row2["lname"];?>
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
                <div class="page-title">
                    <div class="title_left">
                        <h3>Book Details</h3>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                                $res=mysqli_query($link,"select * from books");
                                echo "<table class='table table-bordered'>"; 
                                echo "<tr>";
                                
                                echo "<th>"; echo "Book Id"; echo "</th>";
                                echo "<th>"; echo "Course Id"; echo "</th>";
                                echo "<th>"; echo "Book Isbn"; echo "</th>";
                                echo "<th>"; echo "Book Name"; echo "</th>";
                                echo "<th>"; echo "Publication Name"; echo "</th>";
                                echo "<th>"; echo "Edition"; echo "</th>";
                                echo "<th>"; echo "Author Name"; echo "</th>";
                                echo "<th>"; echo "Actual Price"; echo "</th>";
                                echo "<th>"; echo "Selling Price"; echo "</th>";
                                echo "<th>"; echo "Sold"; echo "</th>";
                                echo "</tr>";
                                while($row=mysqli_fetch_array($res))
                                {
                                    echo "<tr>";
                                    echo "<td>"; echo $row["bookid"]; echo "</td>";
                                    echo "<td>"; echo $row["courseid"]; echo "</td>";
                                    echo "<td>"; echo $row["bookisbn"]; echo "</td>";
                                    echo "<td>"; echo $row["bookname"]; echo "</td>";
                                    echo "<td>"; echo $row["publicationname"]; echo "</td>";
                                    echo "<td>"; echo $row["edition"]; echo "</td>";
                                    echo "<td>"; echo $row["authorname"]; echo "</td>";
                                    echo "<td>"; echo $row["actualprice"]; echo "</td>";
                                    echo "<td>"; echo $row["sellingprice"]; echo "</td>";
                                    echo "<td>"; echo $row["sold"]; echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <?php
include "footer.php";
?>

       
