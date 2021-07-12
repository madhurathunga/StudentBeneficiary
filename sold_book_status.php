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
                            <li><a href="sold_books.php"><i class="fa fa-list-alt"></i> Sold books <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="wishlist_books.php"><i class="fa fa-heart"></i> Wishlist <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="options.php"><i class="fa fa-shopping-cart"></i> Options page <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="bought_books.php"><i class="fa fa-gavel"></i> Bought books <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="add_books.php"><i class="fa fa-money"></i> Sell book <span class="fa fa-chevron"></span></a>

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
                                <h2>Sold book status</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                                $res4=mysqli_query($link,"select * from student where username='$_SESSION[username]'");
                                $row4=mysqli_fetch_array($res4);
                                $res3=mysqli_query($link,"select * from books where (bookid in (select bookid from transaction where (usn='$row4[usn]') and (role='sell' and approval=0))) and (sold='No')");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>";
                                echo "<b>"."Book name"."</b>";
                                echo "</th>";
                                echo "<th>";
                                echo "<b>"."Course id"."</b>";
                                echo "</th>";
                                echo "<th>";
                                echo "<b>"."Book isbn"."</b>";
                                echo "</th>";
                                echo "<th>";
                                echo "<b>"."Publication name"."</b>";
                                echo "</th>";
                                echo "<th>";
                                echo "<b>"."Author name"."</b>";
                                echo "</th>";
                                echo "<th>";
                                echo "<b>"."Edition"."</b>";
                                echo "</th>";
                                echo "<th>";
                                echo "<b>"."Selling for"."</b>";
                                echo "</th>";
                                echo "<th>";
                                echo "<b>"."Payment done by buyer?"."</b>";
                                echo "</th>";
                                echo "</tr>";
                                $i=0;
                                while($row3=mysqli_fetch_array($res3))
                                {
                                    $i=$i+1;
                                    echo "<td>";
                                    echo "<b>".$row3["bookname"]."</b>";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<b>".$row3["courseid"]."</b>";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<b>".$row3["bookisbn"]."</b>";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<b>".$row3["publicationname"]."</b>";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<b>".$row3["authorname"]."</b>";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<b>".$row3["edition"]."</b>";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<b>".$row3["sellingprice"]."</b>";
                                    echo "</td>";
                                    echo "<td>"; ?> <a href="yess.php?id=<?php echo $row3['bookid']; ?>">Yes</a> <?php echo "</td>";
                                    if($i==1)
                                    {
                                        echo "</tr>";
                                        echo "<tr>";
                                        $i=0;

                                    }

                                }
                                echo "</tr>";
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