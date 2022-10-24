<?php (error_reporting(0));?>
<?php include('includes/log_status.php')?>
<?php include('includes/header.php')?>
<?php include('includes/topbar.php')?>
<?php $email=$_SESSION['user_email'];
require "includes/connection.php";
$str="select * from loans_applied where a_email='$email'";
$loan_res=mysqli_query($con,$str);
?>
<body>
    <!-- /.top-bar -->
    <div class="page-headers">
        <div class="container">
            <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.html">Loan Account</a></li>
                            <li class="active">Wallet</li>
                        </ol>
                    </div>
                </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                   <div class="bg-white pinside30">
                        <div class="row">
                           <div class="col-xl-4 col-lg-4 col-md-9 col-sm-12 col-12">
                                <h1 class="page-title">Your Loan Account</h1>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-3 col-sm-12 col-12">
                                <div class="row">
                                       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="btn-action"><h1>Name: <?php echo $loan_row['a_name'];?></h1>                                         
                                        <?php $amt=0;
                                        if(mysqli_num_rows($loan_res)>0)
                                        { 
                                            
                                            for($i=0;$i<mysqli_num_rows($loan_res);$i++)
                                            {
                                                $loan_row=mysqli_fetch_assoc($loan_res);
                                                $lid=$loan_row['l_id'];
                                                $str="select * from payment_status where user_email='$email' and l_id='$lid'";
                                                $payment_res=mysqli_query($con,$str);
                                                $payment_row=mysqli_fetch_assoc($payment_res);
                                                if($payment_row['status']=="Pending"){ 
                                                    $amt+=$loan_row['amount'];                                                   
                                                }
                                            }
                                        }
                                        ?> 
                                        <h1><small>Applied Loan Amount: <?php echo $amt;?></h1> 
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="wrapper-content bg-white pinside40">
                        
                
                            <div class="row">
                               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <table class="table table-bordered"> 
                                    <thead> 
                                   <tr> 
                                            <th>Loan Id</th>
                                             <th>Loan Date</th> 
                                             <th>Loan Amount</th>
                                             <th>Loan Type</th> 
                                             <th>Status</th> 
                                             <th>Action</th>
                                            </tr>
                                            
                                        </thead>
                                         <tbody>
                                         <?php 
                                                require "includes/connection.php";
                                                $email=$_SESSION['user_email'];
                                                $str="select * from loans_applied where a_email='$email'";
                                                $res=mysqli_query($con,$str);
                                                if(mysqli_num_rows($res)>0)
                                                {
                                                    for($i=0;$i<mysqli_num_rows($res);$i++){
                                                        $loan_row=mysqli_fetch_array($res); 
                                                        $l_id=$loan_row['l_id'];
                                                        if($loan_row['status']=="Approved"){   
                                                        echo " <tr> 
                                              <th scope='row'>".$loan_row['l_id']."</th>  
                                                  <td> ".$loan_row['l_date']."</td> 
                                                  <td> ".$loan_row['amount']."</td> 
                                                  <td> ".$loan_row['l_type']."</td>
                                                  <td> ".$loan_row['status']."</td>";
                                                  $str="select * from payments where l_id='$l_id'";
                                                  $paid_res=mysqli_query($con,$str);
                                                  $paid_row=mysqli_fetch_assoc($paid_res);
                                                  if($paid_row['p_status']=="Paid")
                                                  {
                                                    echo "<td> Paid! </td>";
                                                  }else{
                                                    echo "<td><a href='payments.php?id=".$loan_row['l_id']."' class='btn btn-default'>Repay</a></td>";
                                                  }
                                                   echo "</tr>";
                                            }}}?>  
                                                  
                                                    </tbody> 
                                                </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content end -->
<?php include('includes/footer.php')?>
