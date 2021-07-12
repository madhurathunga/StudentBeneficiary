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
                            <li><a href="sold_book_status.php"><i class="fa fa-check"></i> Sold book status <span class="fa fa-chevron"></span></a>

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
                <div class="page-title">
                    <div class="title_left">
                        <h3></h3>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Sell book</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                    <table class="table table-bordered">
                                        <select name="cou" class="form-control selectpicker">
                                        <?php
                                            $res5=mysqli_query($link,"select coursename from course");
                                                while($row5=mysqli_fetch_array($res5))
                                                {
                                                    echo "<option>";
                                                    echo $row5["coursename"];
                                                    echo "</option>";
                                                }
                                        ?>
                                        </select>
                                        <tr>
                                            <td>
                                            <input type="text"class="form-control" placeholder="Enter book name" name="booksname" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text"class="form-control" placeholder="Enter bookisbn" name="bisbn" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text"class="form-control" placeholder="Enter author name" name="bauthorname" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text"class="form-control" placeholder="Enter publication name" name="pname" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text"class="form-control" placeholder="Enter edition" name="edition" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text"class="form-control" placeholder="Enter actual price" name="bprice" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text"class="form-control" placeholder="Enter price expected after selling" name="sprice" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="submit"  name="submit1" class="btn btn-default submit" value="Add book for selling" style="background-color: blue; color:white"></td>
                                        </tr>
                                    </table>          
                                </form>                      





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
if(isset($_POST["submit1"]))
{ 
    $res7=mysqli_query($link,"select * from course where coursename like('%$_POST[cou]%')");
    $row7=mysqli_fetch_array($res7);
    mysqli_query($link,"insert into books (courseid,bookisbn,bookname,publicationname,edition,authorname,actualprice,sellingprice) values ('$row7[courseid]','$_POST[bisbn]','$_POST[booksname]','$_POST[pname]','$_POST[edition]','$_POST[bauthorname]','$_POST[bprice]','$_POST[sprice]')");
    $res10=mysqli_query($link,"select max(bookid) from books");
    $row10=mysqli_fetch_array($res10);
    $b=$row10['max(bookid)'];
    $req=$b;
    $res8=mysqli_query($link,"select * from student where username='$_SESSION[username]'");
    $row8=mysqli_fetch_array($res8);
    mysqli_query($link,"insert into transaction (usn,bookid,dateofbookadded,role) values ('$row8[usn]',$req,curdate(),'sell')");?>
    <script type="text/javascript">
        alert("Book kept for selling");
        window.location="sold_book_status.php";
    </script><?php
}
?>
<?php
include "footer.php";
?>