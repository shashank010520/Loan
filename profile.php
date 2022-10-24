<?php include('includes/log_status.php')?>
<?php include('includes/header.php')?>
<?php include('includes/topbar.php')?>

<?php 
   require "includes/connection.php";
    $email=$_SESSION['user_email'];
    $str="select * from user_table where email='$email'";
    $res=mysqli_query($con,$str);
    $row=mysqli_fetch_assoc($res);
?>
<div class="hero-home-loan">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                </div>
<div class="offset-xl-1 col-xl-10 offset-lg-1 col-lg-10 offset-md-1 col-md-10 col-sm-12 col-12">
                    <div class="request-form">
                        <h2 class="form-title">Edit profile</h2>
                        <p>Make changes to your profile!</p>
                        <form class="row" method="post">
                            <!-- Text input-->
                            <div class="form-group col-md-6">
                                <label class="control-label sr-only" for="name">Name</label>
                                <input id="name" name="name" type="text" placeholder="name" value="<?php echo $row['name'];?>" class="form-control input-md">
                            </div>
                            <!-- Text input-->
                            <div class="form-group col-md-6">
                                <label class="control-label sr-only" for="email">E-Mail</label>
                                <input id="email" name="email" type="email" placeholder="email" value="<?php echo $row['email'];?>" class="form-control input-md" readonly/>
                            </div>
                            <!-- Text input-->
                            <div class="form-group col-md-6">
                                <label class="control-label sr-only" for="phone">Phone</label>
                                <input id="phone" name="phone" type="number" placeholder="phone" value="<?php echo $row['phone'];?>" class="form-control input-md">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label sr-only" for="phone">Address</label>
                                <input id="phone" name="addr" type="text" placeholder="address" value="<?php echo $row['address'];?>" class="form-control input-md">
                            </div>
                            <!-- Select Basic -->
                            <!-- Button -->
                            <?php
            if(isset($_POST['refresh'])){
                echo "<script>location.href='profile.php';</script>";                                                
            }
                                if(isset($_POST['update']))
                                {
                                    require "includes/connection.php";
                                    $name = $_POST['name']; 
                                    $mobile = $_POST['phone']; 
                                    $email = $_POST['email']; 
                                    $addr = $_POST['addr'];                                                                          
                                    
                                    if($name=="" or $mobile=="" or $email=="" or $addr==""){
                                        echo "<script>alert('All the fields should be filled')</script>";
                                    }else{                                        
                                            $str = "Update user_table set name='$name',phone=$mobile,address='$addr' where email='$email'";
                                            if(mysqli_query($con,$str)){                                                                                                                          
                                                echo "<script>alert('Account Updated successfully');</script>";                                                
                                            } else{
                                                echo "<script>alert('Error in Updating an account');</script>";
                                            }                                                                        
                                    }
                                }
                                 
                                ?>
                            <div class="form-group col-md-6">
                               <button type="submit" class="btn btn-default btn-block" name="update">Make Changes</button>
                            </div>
                            <div class="form-group col-md-6">
                               <button type="submit" class="btn btn-default btn-block" name="refresh">Refresh</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php')?>