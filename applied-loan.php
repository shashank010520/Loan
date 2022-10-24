<?php include('includes/log_status.php')?>
<?php include('includes/header.php')?>
<?php include('includes/topbar.php')?>



<body>
    <!-- /.top-bar -->
    <div class="page-headers">
        <div class="container">
            <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.html">Loan Account</a></li>
                            <li class="active">Loans Applied</li>
                        </ol>
                    </div>
                </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                   <div class="bg-white pinside30">
                        <div class="row">
                           <div class="col-xl-4 col-lg-4 col-md-9 col-sm-12 col-12">
                                <h1 class="page-title">Loans Applied</h1>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-3 col-sm-12 col-12">
                                <div class="row">
                                       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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
                                    <div class="section-title mb30">
                                        <h1>Loans Applied</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <table class="table table-bordered"> <thead> 
                                    <tbody>
                                        <tr> 
                                            <th>Loan Id</th>
                                             <th>Loan Date</th> 
                                             <th>Loan Amount</th>
                                             <th>Loan Type</th> 
                                             <th>Status</th> 
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
                                                        echo "<tr> 
                                                  <th>". $loan_row['l_id']."</th>  
                                                  <td>". $loan_row['l_date']."</td> 
                                                  <td>". $loan_row['amount']."</td> 
                                                  <td>". $loan_row['l_type']."</td>
                                                  <td>". $loan_row['status']."</td>
                                                </tr>
                                                ";
                                            }}?>  
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
