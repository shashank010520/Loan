<?php include('includes/header.php')?>
<?php include('includes/navbar.php')?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Loans Applied</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Loan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
              <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>User Name</th>
                  <th>User Email</th>
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
                        $email="";
                        $loan_id="";
                        if(isset($_GET['lid']))
                          {
                              $id=$_GET['lid'];
                              $mail_id=$_GET['email'];                              
                              $str="update loans_applied set status='Approved' where l_id='$id'";
                              if(mysqli_query($con,$str))                            
                              {                                   
                                  $sql2= "INSERT INTO payment_status VALUES ('$id', '$mail_id', 'Pending')";
                                  mysqli_query($con, $sql2);  
                                  echo "<script> location.href='user-loans.php'; </script>";
                              }
                          }
                          if(isset($_GET['reject']))
                          {         
                              $id=$_GET['reject'];
                              $mail_id=$_GET['email'];
                              if($_GET['type']=="Emergency Health Loan")
                              {
                                $str="DELETE FROM `hreport_table` WHERE l_id='$id'";
                                mysqli_query($con,$str);
                              }else{
                                $str="delete from documents where a_email='$mail_id'"; 
                                mysqli_query($con,$str);  
                              }                              
                            
                                $str="update loans_applied set status='Rejected' where l_id='$id'";
                                if(mysqli_query($con,$str))
                                {                      
                                    echo "<script> location.href='user-loans.php'; </script>";
                                }                              
                          }
                        $str="select * from loans_applied";
                        $res=mysqli_query($con,$str);
                        if(mysqli_num_rows($res)>0)
                        {
                            for($i=0;$i<mysqli_num_rows($res);$i++)
                            {
                              $row=mysqli_fetch_assoc($res);
                              $email=$row['a_email'];
                              $loan_id=$row['l_id'];
                      ?>                        
                        <tr>
                          <td><?php echo $row['a_name'];?></td>
                          <td> <?php echo $row['a_email'];?></td>
                          <td> <?php echo $row['l_id'];?></td>
                          <td><?php echo $row['l_date'];?></td>
                          <td><?php echo $row['amount'];?></td>
                          <td><?php echo $row['l_type'];?></td>
                          <td><?php echo $row['status'];?></td>
                          <td> <?php  
                          if($row['status']=="Pending"){
                            echo '<a href="user-loans.php?lid='.$row["l_id"].'&email='.$row['a_email'].'"><i class="fa fa-check text-success" data-toggle="tooltip" data-placement="top" title="Complete"style="font-size:32px"></i></a>';
                          } 
                          if($row['status']=="Pending"){                           
                            echo '<a href="user-loans.php?reject='.$row["l_id"].'&email='.$row['a_email'].'&type='.$row['l_type'].'"><i class="fa fa-times text-danger" data-toggle="tooltip" data-placement="top" title="reject" style="font-size:32px"></i></a>';
                          } 
                          ?>                             
                          </td>                          
                        </tr>
                        <?php }}?>  </td> 
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Button trigger modal -->

  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include('includes/footer.php')?>


                           