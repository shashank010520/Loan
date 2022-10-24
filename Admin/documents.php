<?php include('includes/header.php')?>
<?php include('includes/navbar.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Registered Users</li>
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
                    <th>Applicant Email</th>
                    <th>Applicant Photo</th>
                    <th>Applicant Aadhar</th>
                    <th>Applicant College ID</th>
                    <th>Applicant Bank Passbook</th>
                    <th>Applicant Pan card</th>
                    <th>Applicant Address Proof</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                        require "includes/connection.php";
                        if(isset($_GET['id']))
                          {
                              $email=$_GET['id'];
                              $str="delete from documents where a_email='$email'";
                              if(mysqli_query($con,$str))
                              {
                                  echo "<script> location.href='documents.php'; </script>";
                              }
                          }
                        $str="select * from documents";
                        $res=mysqli_query($con,$str);
                        if(mysqli_num_rows($res)>0)
                        {
                            for($i=0;$i<mysqli_num_rows($res);$i++)
                            {
                              $row=mysqli_fetch_assoc($res);                          
                      ?>
                        <tr>
                          <td> <?php echo $row['a_email'];?></td>
                          <td><a href="../uploads/photo/<?php echo $row['a_photo'];?>"><i class="fa fa-download"></i></a></td>
                          <td><a href="../uploads/adhar/<?php echo $row['a_aadhar'];?>"><i class="fa fa-download"></i></a></td>
                          <td><a href="../uploads/cid/<?php echo $row['a_cidproof'];?>"><i class="fa fa-download"></i></a></td>
                          <td><a href="../uploads/pb/<?php echo $row['a_passbook'];?>"><i class="fa fa-download"></i></a></td>
                          <td><a href="../uploads/pan/<?php echo $row['a_pan'];?>"><i class="fa fa-download"></i></a></td>
                          <td><a href="../uploads/address/<?php echo $row['a_addressproof'];?>"><i class="fa fa-download"></i></a></td>
                          <td><a href="documents.php?id=<?php echo $row['a_email'];?>"><i class="fa fa-trash text-danger" data-toggle='tooltip' data-placement='top' title='Delete'style="font-size:32px"></i></a></td>
                        </tr>
                        <?php }}?>  
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
