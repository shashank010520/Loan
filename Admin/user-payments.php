<?php include('includes/header.php')?>
<?php include('includes/navbar.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Loans Paid</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Payments</li>
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
                  <th>Payment Id</th>
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>Payment Date</th> 
                  <th>Loan Type</th>  
                  <th>Payment Type</th>
                  <th>Paid Amount</th>
                  <th>Status</th>   
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                        require "includes/connection.php";
                        $str="select * from payments";
                        $res=mysqli_query($con,$str);
                        if(mysqli_num_rows($res)>0)
                        {
                            for($i=0;$i<mysqli_num_rows($res);$i++)
                            {
                              $row=mysqli_fetch_assoc($res);                          
                      ?>
                      <tr>
                          <td><?php echo $row['payment_id'];?></td>
                          <td> <?php echo $row['co_name'];?></td>
                          <td> <?php echo $row['co_email'];?></td>
                          <td> <?php echo $row['p_date'];?></td>
                          <td> <?php echo $row['l_type'];?></td>
                          <td> <?php echo $row['p_type'];?></td>
                          <td> <?php echo $row['pay_amount'];?></td>
                          <td> <?php echo $row['p_status'];?></td>
                        </tr>
                        <?php }}?> 
                      <td></td>
                  </tbody>
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
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include('includes/footer.php')?>