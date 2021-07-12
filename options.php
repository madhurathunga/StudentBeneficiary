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
                            <li><a href="sold_book_status.php"><i class="fa fa-check"></i> Sold book status <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="sold_books.php"><i class="fa fa-list-alt"></i> Sold books <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="bought_books.php"><i class="fa fa-gavel"></i> Bought books <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href="wishlist_books.php"><i class="fa fa-heart"></i> Wishlist <span class="fa fa-chevron"></span></a>

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
                                <h2>Search Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <form name="form1" action="" method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                    <select name="book" class="form-control selectpicker">
                                        <?php
                                            $res5=mysqli_query($link,"select distinct bookname from books where ((sold='No') and (bookid not in (select bookid from transaction where usn=(select usn from student where username='$_SESSION[username]'))))");
                                                while($row5=mysqli_fetch_array($res5))
                                                {
                                                    echo "<option>";
                                                    echo $row5["bookname"];
                                                    echo "</option>";
                                                }
                                        ?>
                                    </select>

                                    
                                </td>
                                <td><input type="submit" name="submit1" value="Search" class="form-control btn btn-default"></td>
                                </tr>

                            </table>
                            </form>


                            <?php
                            if(isset($_POST["submit1"]))
                            {
                                
                                $res3=mysqli_query($link,"select * from books where (bookname like('%$_POST[book]%') and (sold='No' and bookid not in (select bookid from transaction where usn in (select usn from student where username='$_SESSION[username]') )))");
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
                                echo "<b>"."Actual price"."</b>";
                                echo "</th>";
                                echo "<th>";
                                echo "<b>"."Selling price"."</b>";
                                echo "</th>";
                                echo "<th>";
                                echo "<b>"."Owned by"."</b>";
                                echo "</th>";
                                echo "<th>";
                                echo "<b>"."Contact"."</b>";
                                echo "</th>";
                                echo "<th>";
                                echo "<b>"."Email"."</b>";
                                echo "</th>";
                                echo "<th>";
                                echo "<b>"."Buy?"."</b>";
                                echo "</th>";
                                echo "</tr>";
                                
                                while($row3=mysqli_fetch_array($res3))
                                {
                                   
                                    echo "<tr>";
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
                                    echo "<b>".$row3["actualprice"]."</b>";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<b>".$row3["sellingprice"]."</b>";
                                    echo "</td>";
                                    $res15=mysqli_query($link,"select * from student where usn in (select usn from transaction where bookid='$row3[bookid]')");
                                    $row15=mysqli_fetch_array($res15);
                                    echo "<td>";
                                    echo "<b>".$row15["fname"]." ".$row15["lname"]."</b>";
                                    echo "</td>";
                                    $res16=mysqli_query($link,"select * from student_register where username='$row15[username]'");
                                    $row16=mysqli_fetch_array($res16);
                                    echo "<td>";
                                    echo "<b>".$row16["phoneno"]."</b>";
                                    echo "</td>";
                                    echo "<td>";
                                    ?>
                                    <a href="mailto: <?php echo $email?>"style="color:black"><?php echo $row16['email'] ?></a><?php
                                    echo "</td>";
                                    
                                    echo "<td>"; ?> <a href="buy.php?id=<?php echo $row3['bookid']; ?>">Buy</a> <?php echo "</td>";
                                    
                                    echo "</tr>";
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