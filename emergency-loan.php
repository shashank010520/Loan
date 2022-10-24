<?php include('includes/log_status.php')?>
<?php include('includes/header.php')?>
<?php include('includes/topbar.php')?>
<?php include('efile_logic.php')?>
<div class="section-space80 bg-gradient call-to-action">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-md-2 col-md-8 offset-md-2 col-md-8 col-sm-12 col-12">
                    <div class="section-title mb60 text-center">
                        <!-- section title start-->
                        <h1 class="text-white">Emergency Health Loans</h1>
                        <p class="text-white">Once the form is validated loan will be deposited instantly</p>
                        <marquee class="text-danger"><strong>Loan will only be approved if the documents are valid and old loan is repaid!</strong></marquee>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-md-2 col-md-8 offset-md-2 col-md-8 col-sm-12 col-12">
                    <div class="students-request-form">
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
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <label class="control-label sr-only" for="email">cid proof</label>
                                    <a class="btn btn-primary btn-xs mt20">Upload Valid hospital report*</a>
                                    <input id="hospital" name="hreport" type="file" placeholder="Upload College id proof*" class="form-control input-md" required="">
                                    <a href="proofs.php"><small>Learn more?</small></a>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                                    <div class="slide-ranger">
                                        <p id="slider-range-min"></p>
                                        <label for="amount" class="control-label sr-only">Loan Amount</label>
                                        <input type="text" id="amount" name="amount" readonly class="form-control">
                                        <marquee class="text-warning"><strong>Note: Valid amount is 5000 and 10000 Rs only!</strong></marquee>
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                                    <button type="submit" name="save" class="btn btn-default btn-block">Send A Request</button>
                                </div>
                            </div>
                        </form>
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
            value: 5000,
            min: 1000,
            max: 10000,
            slide: function(event, ui) {
                $("#amount").val( ui.value);
            }
        });
        $("#amount").val($("#slider-range-min").slider("value"));
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