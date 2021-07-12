<?php
 session_start();
 include "connection.php";  
 $query = "SELECT role, count(*) as number FROM transaction GROUP BY role";  
 $query2 = "select domainname,count(*) as noofbooksinthiscourse from course where courseid in (select courseid from books) group by domainname";  
 $query3 = "select count(*) as numberoftransaction, date_format(dateofbookadded,'%Y-%m')as month_group from transaction where approval=1 group  by month(dateofbookadded)"; 
 $query4 = "select concat(20*floor(round((((actualprice-sellingprice)*100)/actualprice),2)/20), '% to ', 20*floor(round((((actualprice-sellingprice)*100)/actualprice),2)/20) + 20,'%') as 'range',
       count(*) as 'numberofbooks' from books group by 1 ";
$result = mysqli_query($link, $query); 
$result2 = mysqli_query($link, $query2); 
$result3 = mysqli_query($link, $query3);
$result4 = mysqli_query($link, $query4); 
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
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
     <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Role', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["role"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]); 
					 var data2 = google.visualization.arrayToDataTable([  
                          ['Domain', 'Number'],  
                          <?php  
                          while($row2 = mysqli_fetch_array($result2))  
                          {  
                               echo "['".$row2["domainname"]."', ".$row2["noofbooksinthiscourse"]."],";  
                          }  
                          ?>  
                     ]); 
                 
                var data3 = google.visualization.arrayToDataTable([  
                          ['Month', 'Number of Sucessful transaction'],  
                          <?php  
                          while($row3 = mysqli_fetch_array($result3))  
                          {  
                               echo "['".$row3["month_group"]."', ".$row3["numberoftransaction"]."],";  
                          }
                          ?>
		   ]);        
		 var data4 = google.visualization.arrayToDataTable([  
                          ['profit', 'Number of books'],  
                          <?php  
                          while($row4 = mysqli_fetch_array($result4))  
                          {  
                               echo "['".$row4["range"]."', ".$row4["numberofbooks"]."],";  
                          }  
                          ?>  
                     ]);  
                			 
				
                var options = {  
                      title: 'Percentage of buy and sell',  
                      //is3D:true,  
                      pieHole: 0.4  
                     }; 
                 var options2 = {  
                      title: 'Percentage of books in the domain',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var options3 = {  
                      title: 'Transaction ',  
                      //is3D:true,  
                      
                     };	
                 var options4 = {  
                      title: 'Books categorized into range of offer',  
                      //is3D:true,  
                   //   pieHole: 0.4  
                    }; 					 
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
				 var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));  
                chart2.draw(data2, options2);
				 var chart3 = new google.visualization.LineChart(document.getElementById('piechart3'));  
                chart3.draw(data3, options3);
				 var chart4 = new google.visualization.ColumnChart(document.getElementById('piechart4'));  
                chart4.draw(data4, options4);
           }  
           </script>  
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
                            <li><a href='studentlist.php'><i class="fa fa-child"></i> Students list <span class="fa fa-chevron"></span></a>

                            </li>
                            
                            <li><a href='admin_approve.php'><i class="fa fa-check-square-o"></i> Approve/Disapprove Admin <span class="fa fa-chevron"></span></a></li>

                            <li><a href='adminlist.php'><i class="fa fa-user"></i> Admins list <span class="fa fa-chevron"></span></a></li>
                            
                            <li><a href='student_approve.php'><i class="fa fa-check-square"></i> Approve/Disapprove Students <span class="fa fa-chevron"></span></a>

                            </li>
                            
                            <li><a href='courselist.php'><i class="fa fa-file"></i> Courses list <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href='bookslist.php'><i class="fa fa-book"></i> Books list <span class="fa fa-chevron"></span></a>

                            </li>
                            <li><a href='transactionlist.php'><i class="fa fa-exchange"></i> Transactions list <span class="fa fa-chevron"></span></a></li>
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
                 <h3></h3>
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
                       
                    </div>

                   
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h1>Overall Analysis</h1>
								
                
                <br />
				
                <div id="piechart" style="width: 100%; height: 500px; "></div>  
          
		       
                
                <div id="piechart2" style="width: 100%; height: 500px;"></div>  
             
		     
		       
                 
                <div id="piechart3" style="width: 100%; height: 500px;"></div>  
				<div id="piechart4" style="width: 900px; height: 500px;"></div>
           


                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                                $res=mysqli_query($link,"select count(1) from student_register");
								$row=mysqli_fetch_array($res);
								$total=$row[0];
								 $res1=mysqli_query($link,"select count(1) from student");
								$row1=mysqli_fetch_array($res1);
								$total1=$row1[0];
								$res5=mysqli_query($link,"select count(1) from admin_register");
								$row5=mysqli_fetch_array($res5);
								$total5=$row5[0];
								$res6=mysqli_query($link,"select count(1) from admin");
								$row6=mysqli_fetch_array($res6);
								$total6=$row6[0];
								$res2=mysqli_query($link,"select count(1) from transaction where role='buy'and approval=1");
								$row2=mysqli_fetch_array($res2);
								$total2=$row2[0];
								$res3=mysqli_query($link,"select count(1) from transaction where role='sell'and approval=1");
								$row3=mysqli_fetch_array($res3);
								$total3=$row3[0];
								$res4=mysqli_query($link,"select count(1) from books where 0.75 * actualprice >= sellingprice ");
								$row4=mysqli_fetch_array($res4);
								$total4=$row4[0];
								$res7=mysqli_query($link,"select count(1) from books");
								$row7=mysqli_fetch_array($res7);
								$total7=$row7[0];
								$res8=mysqli_query($link,"select count(1) from books where sold='yes'");
								$row8=mysqli_fetch_array($res8);
								$total8=$row8[0];
								$total9=($total8/$total7)*100;
								$res10=mysqli_query($link,"select count(1) from transaction where dateofbookadded like '2020-12%' and role='sell'");
								$row10=mysqli_fetch_array($res10);
								$total10=$row10[0];
								$res11=mysqli_query($link,"select count(1) from transaction where dateofbookadded like '2020-12%' and role='buy'");
								$row11=mysqli_fetch_array($res11);
								$total11=$row11[0];
								$res12=mysqli_query($link,"select avg(sellingprice) as average from books");
								$row12=mysqli_fetch_assoc($res12);
								echo "<b>";
                                echo "<table class='table table-bordered'>"; 
                                echo "<tr>";                              
                                echo "<td>"; echo "No of registered students"; echo "</td>";
                                echo "<td>"; echo $total; echo "</td>";
                                echo "</tr>";
								echo "<tr>";
                                echo "<td>"; echo "No of Logged in students"; echo "</td>";
                                echo "<td>"; echo $total1; echo "</td>";
                                echo "</tr>";
                                echo "<tr>";                              
                                echo "<td>"; echo "No of registered Admins"; echo "</td>";
                                echo "<td>"; echo $total5; echo "</td>";
                                echo "</tr>";
                                echo "<tr>";                              
                                echo "<td>"; echo "No of logged in admins"; echo "</td>";
                                echo "<td>"; echo $total6; echo "</td>";
                                echo "</tr>";								
                                echo "<tr>";
                                echo "<td>"; echo "No of books successfully recieved by the students"; echo "</td>";
                                echo "<td>"; echo $total2; echo "</td>";
                                echo "</tr>"; 
                                  echo "<tr>";
                                echo "<td>"; echo "No of students who successfully sold the books and recieved money "; echo "</td>";
                                echo "<td>"; echo $total3; echo "</td>";
                                echo "</tr>";  								
                                   echo "<tr>";
                                echo "<td>"; echo "No of Books more then 30% off"; echo "</td>";
                                echo "<td>"; echo $total4; echo "</td>";
                                echo "</tr>";  								
                                  echo "<tr>";
                                echo "<td>"; echo "Percentage of books sold from the database"; echo "</td>";
                                echo "<td>"; echo round($total9,2); echo "</td>";
                                echo "</tr>"; 
                                 echo "<tr>";
                                echo "<td>"; echo "No of books added in this month"; echo "</td>";
                                echo "<td>"; echo $total10; echo "</td>";
                                echo "</tr>";  								
                                 echo "<tr>";
                                echo "<td>"; echo "No of books sold in this month"; echo "</td>";
                                echo "<td>"; echo $total11; echo "</td>";
                                echo "</tr>";  
								 echo "<td>"; echo "Average price of the book"; echo "</td>";
                                echo "<td>"; echo round($row12["average"],2); echo "</td>";
                                echo "</tr>";  
                                echo "</table>";
								echo "</b>";
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

       
