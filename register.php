
<?php include('includes/topbar1.php')?>
<?php include('includes/header.php');?>
    <!-- .site-header -->
    <div class="hero">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="hero-captions">
                        <h2 class="hero-title">Exclusive loans for students </h2>
                        <p class="hero-text">Lowest Interest Rates - Calculate EMI - Check Eligibility - Instant e-Approval - Special Offers </p>
                        <div class="price-rate">
                            <div class="new-price"><span class="price-big">Already a member? </span></div>
                        </div>
                        <a href="Login.php" class="btn btn-default btn-sm">Login</a>
                    </div>
                </div>
                <div class="offset-xl-1 col-xl-5 offset-lg-1 col-lg-5 offset-md-1 col-md-5  col-sm-12 col-12">
                    <div class="request-form">
                        <h2>Register to avail your loans.</h2>
                        <p>Easy to apply for a loan with us,Once you have complete this form. </p>
                        <form action="register.php" method="post">
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="control-label sr-only" for="name">Name</label>
                                <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" required="">
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="control-label sr-only" for="email">Email</label>
                                <input id="email" name="email" type="text" placeholder="E-mail" class="form-control input-md" required="">
                            </div>
                            <div class="form-group">
                                <label class="control-label sr-only" for="password">Password</label>
                                <input id="password" name="pass" type="password" placeholder="Password" class="form-control input-md" required="">
                            </div>
                            <div class="form-group">
                                <label class="control-label sr-only" for="phone">Phone no</label>
                                <input id="phone" name="mobile" type="text" placeholder="Phone no" class="form-control input-md" required="">
                            </div>
                            <div class="form-group">
                                <label class="control-label sr-only" for="address">Address</label>
                                <input id="address" name="addr" type="text" placeholder="Permenant Address" class="form-control input-md" required="">
                            </div>

                            <?php 
									if(isset($_POST['signup']))
									{	
										require "includes/connection.php";										                
                                    $name=$_POST['name'];
                                    $email=$_POST['email'];
                                    $pas=$_POST['pass'];
                                    $mobile=$_POST['mobile'];
                                    $addr=$_POST['addr'];
                                    if($name=="" or $email=="" or $pas==""or $mobile=="")
                                    {
                                        echo "All the fields should be filled";
                                    }
                                    else
                                    {   
                                      
                                      if (!preg_match("/^[a-zA-Z-' ]*$/",$name))
                                      {												
                                        echo "<p class='text-danger'>Name should contain Only letters and white space</p>";
                                      }
                                      else
                                      {	$n= strlen($mobile);
                                        if(!preg_match("/^[0-9-' ]*$/",$mobile))
                                        {												
                                          echo "<p class='text-danger'>Mobile Number should contain only numbers!</p>";
                                        }else{	
                                          if($n!=10){
                                            echo "<p class='text-danger'>Invalid Mobile Number!</p>";
                                          }
                                          else{																			
                                            if(!email_validation($email)) 
                                            { 
                                              echo "<p class='text-danger'>Invalid Email address!</p>"; 
                                            } 
                                            else 
                                            { 	$paslen=strlen($pas);
                                              if(!preg_match("/^[a-zA-Z0-9-' ]*$/",$pas))
                                              {												
                                                echo "<p class='text-danger'>Special characters are not allowed!</p>";
                                              }else{
                                                if(!($paslen>=6 && $paslen<=10))
                                                {
                                                  echo "<p class='text-danger'>Password should be more than 6 characters and less than 10 characters.!</p>";
                                                }else{
                                                  $pas=md5($pas);
                                                  $str="select * from user_table where email='$email'";
                                                  $res=mysqli_query($con,$str);
                                                  if(mysqli_num_rows($res)>0)
                                                  {
                                                      echo "User with the email ".$email." already exist";
                                                  }else{
                                                    $str="insert into user_table values('$name','$email','$pas',$mobile,'$addr')";
                                                      if(mysqli_query($con,$str))
                                                      {
                                                          echo "Account created successfully";
                                                      echo "<script>location.href='login.php';</script>";
                                                      }else{
                                                        echo "Some Error! Please try again later.";
                                                      }                                                                                                                                               
                                                  }        
                                                }	
                                              }													 
                                            }
                                          }	
                                        }	
                                      }
									                  }											
                                  }
								?>  
                            <!-- Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-default btn-block" name="signup">Register Now</button>
                            </div>
                            <?php
              function email_validation($str) { 
                return (!preg_match( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str)) ? FALSE : TRUE; 
              }  
            ?>
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
