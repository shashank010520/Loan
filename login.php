<?php session_start();?>
<?php include('includes/topbar1.php')?>
<?php include('includes/header.php');
 include('includes/connection.php'); 
?>
    <!-- .site-header -->
    <div class="hero">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="hero-captions">
                        <h2 class="hero-title">Loans made simpler for students </h2>
                        <p class="hero-text">Lowest Interest Rates - Calculate EMI - Check Eligibility - Instant e-Approval - Special Offers </p>
                        <div class="price-rate">
                            <div class="new-price"><span class="price-big">Not a member yet? </span></div>
                        </div>
                        <a href="register.php" class="btn btn-default btn-sm">Register Now</a>
                    </div>
                </div>
                <div class="offset-xl-1 col-xl-5 offset-lg-1 col-lg-5 offset-md-1 col-md-5  col-sm-12 col-12">
                    <div class="request-form">
                        <h2>Login Now</h2>
                        <p>Easy to apply for a loan with us,Once you have complete this form. </p>
                        <form method="post"> 
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="control-label sr-only" for="name">E-mail</label>
                                <input id="name" name="email" type="email" placeholder="E-mail" class="form-control input-md" required>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="control-label sr-only" for="email">Password</label>
                                <input id="email" name="userpass" type="Password" placeholder="Password" class="form-control input-md" required>
                            </div>

                            <?php 
                                                        include('includes/connection.php');
                                                        if(isset($_POST['user']))
                                                        {                                                                       
                                                            $email=mysqli_real_escape_string($con,$_POST['email']);
                                                            $pas=mysqli_real_escape_string($con,$_POST['userpass']);                                    
                                                            if($email=="" or $pas=="")
                                                            {
                                                                echo "<p class='text-danger'><All the fields should be filled</p>";
                                                            }
                                                            else
                                                            {               
                                                                    $pas=md5($pas);                                            
                                                                    $str="select * from user_table where email='$email' and password='$pas'";
                                                                    $res=mysqli_query($con,$str);
                                                                    if(mysqli_num_rows($res)>0)
                                                                    {
                                                                        $row=mysqli_fetch_assoc($res);
                                                                        $_SESSION['user_email']=$email;                                                                        
                                                                        echo "<script>location.href='home.php';</script>";
                                                                    }else{                                            
                                                                            echo "<p class='text-danger text-center'>Invalid credentials</p>";                                                                                                                                                                                                                                               
                                                                    }                                        
                                                            }
                                                        }
                                                    
                                                    ?> 
                            <!-- Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-default btn-block" name="user">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- /.tiny footer -->
    <!-- back to top icon -->
    <a href="#0 " class="cd-top " title="Go to top ">Top</a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript " src="js/menumaker.js"></script>
 
    <!-- sticky header -->
    <script type="text/javascript " src="js/jquery.sticky.js"></script>
    <script type="text/javascript " src="js/sticky-header.js"></script>
    <!-- Back to top script -->
    <script src="js/back-to-top.js" type="text/javascript "></script>
    <script src="js/accordion.js" type="text/javascript"></script>
    <script src="js/jquery-ui.js"></script>
</body>


</html>
