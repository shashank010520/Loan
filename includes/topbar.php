<?php $email=$_SESSION['user_email'];
require "includes/connection.php";
$str="select * from user_table where email='$email'";
$user_res=mysqli_query($con,$str);
$user_row=mysqli_fetch_assoc($user_res);
?>  

<?php $co_email=$_SESSION['user_email'];
require "includes/connection.php";
$str1="select * from payments where co_email='$co_email'";
$pay_res=mysqli_query($con,$str1);
?>



<body>
    <!-- /.top-bar -->
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <!-- logo -->
                    <div class="logo">
                        <a href="home.php"><img src="images/logo.png" alt="Borrow - Loan Company Website Template"></a>
                    </div>
                </div>
                <!-- logo -->
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                    <div id="navigation">
                        <!-- navigation start-->
                        <ul>
                            <li class="active"><a href="home.php" class="animsition-link">Home</a>
                              
                            </li>
                            <li><a href="#" class="animsition-link">Loan Product</a>
                                <ul>
                                    <li><a href="apply-loan.php?type=Student Personal Loan" title="Student Loan" class="animsition-link">Student Personal Loan</a></li>
                                    <?php if(mysqli_num_rows($pay_res)>0){ 
                                            $pay_row=mysqli_fetch_assoc($pay_res);
                                        if($pay_row['p_status']=="Paid"){ 
                                            echo '<li><a href="emergency-loan.php?type=Emergency Health Loan" title="Health Loan" class="animsition-link">Emergency Health Loan</a></li>';
                                        }}
                                        ?>
                                </ul>
                            </li>
                            <li><a href="about.php" class="animsition-link">About us</a>
                            </li> 
                                <li><a href="#" class="animsition-link"> Loan Account</a>
                                    <ul>
                                    <?php 
                                    require "includes/connection.php";
                                    $email=$_SESSION['user_email'];
                                    $str="select * from loans_applied where a_email='$email'";
                                    $res=mysqli_query($con,$str);
                                    if(mysqli_num_rows($res)>0)
                                    {
                                            $loan_row=mysqli_fetch_array($res);
                                            echo "<li><a href='wallet.php' title='Loan Account' class='animsition-link'>Loan Account</a></li>";
                                        }
                                        ?>
                                        <li><a href="applied-loan.php" title="Loans Applied" class="animsition-link">Loans Applied</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" class="animsition-link">Welcome <?php echo $user_row['name'];?></a>
                                    <ul>
                                        <li><a href="profile.php" title="Profile" class="animsition-link">Profile</a></li>
                                        <li><a href="logout.php" title="Log Out" class="animsition-link">Log out</a></li>
                                    </ul>
                                </li>
                                <?php 
                                    require "includes/connection.php";
                                    $email=$_SESSION['user_email'];
                                    $str="select * from loans_applied where a_email='$email'";
                                    $res=mysqli_query($con,$str);
                                    if(mysqli_num_rows($res)>0)
                                    {
                                            $loan_row=mysqli_fetch_array($res);
                                            echo  "<li><a href='wallet.php' class='btn btn-success text-white'>Loan Account</a>";
                                        }
                                        ?>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navigation start-->
                </div>
            </div>
        </div>
    </div>

    