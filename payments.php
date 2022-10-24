<?php include('includes/log_status.php')?>
<?php include('includes/header.php')?>
<?php $email=$_SESSION['user_email'];
require "includes/connection.php";
$id=$_GET['id'];
$str="select * from loans_applied where l_id='$id'";
$loan_res=mysqli_query($con,$str);
$loan_row=mysqli_fetch_assoc($loan_res);
?>
<body>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <a href="index.html" id="branding">
                        <img src="images/logo.png" alt="Company Name" class="logo">
                    </a>
                    <!-- #branding -->
                </div>
                   <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-right"> <a href="wallet.php" class="btn btn-primary btn-xs mt20">Back to Page</a></div>
            </div>
        </div>
        <div class="section-space80 bg-gradient call-to-action">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-md-2 col-md-8 offset-md-2 col-md-8 col-sm-12 col-12">
                    <div class="section-title mb60 text-center">
                        <!-- section title start-->
                        <h1 class="text-white">Make Your Loan Payments Now</h1>
                        <p class="text-white">Choose the Payment type and Pay Now!</p>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-md-2 col-md-8 offset-md-2 col-md-8 col-sm-12 col-12">
                    <div class="students-request-form">
                            <div class="row">
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <form method="post">
                               <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <a class="btn btn-primary btn-xs mt20">Loan Amount:</a>
                                    <label class="control-label sr-only" for="name">amount</label>
                                    <input id="amount" name="amount" type="text" placeholder="amount" value="<?php echo $loan_row['amount'];?>" class="form-control input-md" required="" readonly/>
                                </div>
                                    <p>Please select payment mode:</p>
                                    <input type="radio" id="payment" name="payment" value="upi">
                                    <label for="upi">UPI</label><br>
                                    <input type="radio" id="payment" name="payment" value="online banking">
                                    <label for="female">Online Banking</label><br>
                                    <input type="radio" id="payment" name="payment" value="debit/credit">
                                    <label for="other">Debit/Credit</label>
                                </div>
                                <?php  if(isset($_POST['pay']))
                                {
                                    pid:
                                    $pid="PAY".rand(1000,9999);
                                    $str="select * from payments where payment_id='$pid'";
                                    $res=mysqli_query($con,$str);
                                    if(mysqli_num_rows($res)>0)               
                                    {
                                        goto pid;
                                    }
                                    require "includes/connection.php";
                                    $co_email = $loan_row['a_email'];
                                    $co_name = $loan_row['a_name'];
                                    $l_id=$loan_row['l_id'];
                                    $p_amount = $_POST['amount'];
                                    $l_type = $loan_row['l_type'];
                                    $p_type = $_POST['payment']; 
                                    $p_date = date('Y-m-d');
                                    $p_status = "Paid";                                                                         
                                    
                                    if($p_type==""){
                                        echo "<script>alert('Please Select a Payment Option')</script>";
                                    }else{                                        
                                        $sql = "INSERT INTO payments(payment_id, co_email, co_name, pay_amount,l_id, l_type, p_type, p_date, p_status) VALUES ('$pid', '$co_email', '$co_name', $p_amount,'$l_id','$l_type', '$p_type', '$p_date', '$p_status')";
                                            if(mysqli_query($con,$sql)){      
                                                $str="update payment_status set status='Paid' where l_id='$l_id'";
                                                mysqli_query($con,$str);                                                                                                                    
                                                echo "<script>alert('Successfully Paid');</script>"; 
                                                echo "<script>location.href='wallet.php';</script>";                                               
                                            } else{
                                                echo "<script>alert('Error in making payments');</script>";
                                            }                                                                        
                                    }
                                }
                                 
                                ?>
                                <!-- Text input-->
                                <!-- Button -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                                    <button type="submit" name="pay" class="btn btn-default btn-block">Pay</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <?php include('includes/footer.php')?>
</body>


</html>