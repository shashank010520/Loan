<?php include('includes/header.php')?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?php
                    if(isset($_POST['login']))
                    {
                    require "includes/connection.php";
                    $name = $_POST['name']; 
                    
                    $pass = $_POST['password'];
                    

                    $s = "select * from admin where name = '$name' && password = '$pass'";

                    $result = mysqli_query($con, $s);

                    $num = mysqli_num_rows($result);

                    if($num == 1){
                        $_SESSION['name'] = $name;                           
                        echo "<script>alert('login successful');</script>";
                        echo "<script>location.href='dashboard.php';</script>";
                    }else{
                        echo "<script>alert('invalid credentials')</script>";
                                                
                    }
                    }  
                    ?>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
