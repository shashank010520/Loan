<?php include('includes/log_status.php');?>
<?php include('includes/header.php')?>
<?php include('includes/topbar.php')?>
<?php include('filleslogic.php');?>
<div class="section-space80 bg-gradient call-to-action">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-md-2 col-md-8 offset-md-2 col-md-8 col-sm-12 col-12">
                    <div class="section-title mb60 text-center">
                        <!-- section title start-->
                        <h1 class="text-white">Just take 2 minute for your loan</h1>
                        <p class="text-white">Fill up the form below and loan executive would get in touch with you</p>
                        <marquee class="text-danger"><strong>Loan will only be approved if the documents are valid and old loan is repaid!</strong></marquee>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-md-2 col-md-8 offset-md-2 col-md-8 col-sm-12 col-12">
                    <div class="students-request-form">
                    <?php
                        $str="select * from loans_applied where status='Pending' and a_email='$email'";
                        $result=mysqli_query($con,$str);
                        if(mysqli_num_rows($result)==0)
                        {
                            $str="select * from payment_status where status='Pending' and user_email='$email'";
                            $result=mysqli_query($con,$str);
                            if(mysqli_num_rows($result)==0)
                            {                        
                    ?>
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <!-- Text input-->
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <label class="control-label sr-only" for="name">Name</label>
                                    <input id="name" name="name" type="text" placeholder="Name" value="<?php echo $user_row['name'];?>" class="form-control input-md" required="" readonly/>
                                </div>
                                <!-- Text input-->
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <label class="control-label sr-only" for="email">E-Mail</label>
                                    <input id="email" name="email" type="text" placeholder="E-mail" value="<?php echo $user_row['email'];?>" class="form-control input-md" required="" readonly/>
                                </div>
                                <!-- Text input-->
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <label class="control-label sr-only" for="phone">Phone</label>
                                    <input id="phone" name="phone" type="text" placeholder="Phone" value="<?php echo $user_row['phone'];?>" class="form-control input-md" required="" readonly/>
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <label class="control-label sr-only" for="phone">Phone</label>
                                    <input id="phone" name="address" type="text" placeholder="Address" value="<?php echo $user_row['address'];?>" class="form-control input-md" required="" readonly/> 
                                </div>
                                <!-- Select Basic -->
                                <?php
                            
                                 $str="select * from documents where a_email='$email'";
                                 $res=mysqli_query($con,$str);
                                 if(mysqli_num_rows($res)==0)
                                 {
                                ?>
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <label class="control-label sr-only" for="name">Aadhar</label>
                                    <a class="btn btn-primary btn-xs mt20">Upload Your Aadhar*</a>
                                    <input id="adhar" name="adhar" type="file" placeholder="Upload Aadhar card*" class="form-control input-md" required="">
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <label class="control-label sr-only" for="email">photo</label>
                                    <a class="btn btn-primary btn-xs mt20">Upload Your photo*</a>
                                    <input id="photo" name="photo" type="file" placeholder="Upload Your photo*" class="form-control input-md" required="">
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <label class="control-label sr-only" for="email">address proof</label>
                                    <a class="btn btn-primary btn-xs mt20">Upload your bank passbook pdf*</a>
                                    <input id="passbook" name="passbook" type="file" placeholder="Upload Address Proof*" class="form-control input-md" required="">
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <label class="control-label sr-only" for="email">address proof</label>
                                    <a class="btn btn-primary btn-xs mt20">Upload Your pancard*</a>
                                    <input id="pan" name="pan" type="file" placeholder="Upload Address Proof*" class="form-control input-md" required="">
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <label class="control-label sr-only" for="email">address proof</label>
                                    <a class="btn btn-primary btn-xs mt20">Upload Your Address Proof*</a>
                                    <input id="adr_proof" name="adr_proof" type="file" placeholder="Upload Address Proof*" class="form-control input-md" required="">
                                    <a href="proofs.php"><small>Learn more?</small></a>
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <label class="control-label sr-only" for="email">cid proof</label>
                                    <a class="btn btn-primary btn-xs mt20">Upload Your college id*</a>
                                    <input id="clg_id" name="clg_id" type="file" placeholder="Upload College id proof*" class="form-control input-md" required="">
                                    <a href="proofs.php"><small>Learn more?</small></a>
                                </div>
                                <?php }?>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                                    <div class="slide-ranger">
                                        <p id="slider-range-min"></p>
                                        <label for="amount" class="control-label sr-only">Loan Amount</label>
                                        <input type="text" id="amount" name="amount" readonly class="form-control">
                                        <marquee class="text-warning"><strong>Note: Valid amount is 3000 and 5000 Rs only!</strong></marquee>
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                                    <button type="submit" class="btn btn-default btn-block" name="save">Send A Request</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        }else{
                            echo '<p class="text-danger text-center">You have not paid the previous loan amount.</p>';
                            echo '<p class="text-white text-center">Please pay the amount to take loan again.</p>';
                        }}else{
                            echo '<p class="text-danger text-center">You are aleready applied for the loan which is in pending status.</p>';                            
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <?php include('includes/footer.php')?>
    <script>
    $(function() {
        $("#slider-range-min").slider({
            range: "min",
            value: 3000,
            min: 1000,
            max: 5000,
            slide: function(event, ui) {
                $("#amount").val( ui.value);
            }
        });
        $("#amount").val( $("#slider-range-min").slider("value"));
    });
    </script>
    <script>
    $(function() {
        $("#slider-range-max").slider({
            range: "max",
            min: 1,
            max: 10,
            value: 2,
            slide: function(event, ui) {
                $("#j").val(ui.value);
            }
        });
        $("#j").val($("#slider-range-max").slider("value"));
    });
    </script>
</body>


</html>