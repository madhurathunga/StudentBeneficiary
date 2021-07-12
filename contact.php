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
                                <h1>Contact Details</h1>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <ol><h2 style="font-size:28px"><b>You can reach us at the following email ID's : </h2><br>
                                <h4 style="font-size:23px"><li> MADHURA - <a href="mailto:madhurathunga@gmail.com" style="color:black"> madhurathunga@gmail.com </a> </li><br>
                                <li> PRATHYUSHA V RAIKAR - <a href="mailto:prathyusharaikar2000@gmail.com" style="color:black"> prathyusharaikar2000@gmail.com </a> </li><br>
                                <li> SAMHITHA N S - <a href="mailto:nssamhitha@gmail.com" style="color:black"> nssamhitha@gmail.com </a> </li><br>
                                <li> SPOORTHI SHANKAR K V - <a href="mailto:spoorthivinooth988@gmail.com" style="color:black"> spoorthivinooth988@gmail.com <a></li><br>
                            </ol></h4></b>
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