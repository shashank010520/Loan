<?php include('includes/log_status.php')?>
<?php include('includes/header.php')?>
<?php include('includes/topbar.php')?>

<?php $co_email=$_SESSION['user_email'];
$str1="select * from payments where co_email='$co_email'";
$pay_res=mysqli_query($con,$str1);
?>
<body data-gr-c-s-loaded="true">
    <!-- ./.top-bar -->
    <!-- hero-wrapper -->
    <div class="refinance-hero-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                    <!-- hero-caption -->
                    <div class="refinance-hero-block">
                        <h1 class="text-white">Easily Refinance Student Loans</h1>
                        <p class="text-white">Average lifetime savings of 5,767 when members refinance to a shorter term. </p>
                        <!---/.<a href="apply-loan.php" class="btn btn-default">Apply Now</a>--->
                    </div>
                    <!-- /.hero-caption -->
                </div>
                <div class="offset-xl-2 col-xl-5 offset-lg-2 col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="refinance-rate-section">
                        <div class="refinance-rate-block">
                            <span>FIXED RATES</span>
                            <h1 class="refinance-rate-block-title">3.20–7.25%</h1>
                        </div>
                        <div class="refinance-rate-block">
                            <span>VARIABLE RATES</span>
                            <h1 class="refinance-rate-block-title">2.57–7.25%</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="section-space100 cta-section-second">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-center">
                        <!-- section title start-->
                        <h1 class="text-white">Lending Emergency health loans. Its easy</h1>
                        <p class="text-white">Just follow some simple steps to get instant emergency loans.</p>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
        </div>
    </div>
    <!-- /.hero-wrapper -->
    <div class="section-space80 bg-white mt-20">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-md-2 col-md-8 offset-md-2 col-md-8 col-sm-12 col-12">
                    <div class="section-title mb60 text-center">
                        <!-- section title start-->
                        <h1>Features & Benefits of Loans</h1>
                        <p>Here is an exhaustive list of all the fees and charges to be paid for the education loan.
                        </p>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-sm-4 col-md-4 col-12">
                    <div class="feature mb40">
                        <div class="feature-icon feature-circle"><i class="fa fa-rocket"></i></div>
                        <div class="feature-content">
                            <h3>High valueable loans</h3>
                            <p>Max loan up to Rs. 5000 for student Personal loans and Max loan up to Rs. 10000 for Emergency Health loans</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-4 col-md-4 col-12">
                    <div class="feature mb40">
                        <div class="feature-icon feature-circle"><i class="fa fa-refresh"></i></div>
                        <div class="feature-content">
                            <h3>Easy Loan Repayment</h3>
                            <p>You can easily repay your loan bills with just a few clicks using your credit/debit cards.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-4 col-md-4 col-12">
                    <div class="feature mb40">
                        <div class="feature-icon feature-circle"><i class="fa fa-glass"></i></div>
                        <div class="feature-content">
                            <h3>100% Transparency</h3>
                            <p>Everything is transparent no hidden charges or originations fees. </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-4 col-md-4 col-12">
                    <div class="feature mb40">
                        <div class="feature-icon feature-circle"><i class="fa fa-gear"></i></div>
                        <div class="feature-content">
                            <h3>Quick and Easy loan approvals</h3>
                            <p>The loans will be easily approved if all the documents are properly validated and debts are repaid on time.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-4 col-md-4 col-12">
                    <div class="feature mb40">
                        <div class="feature-icon feature-circle"><i class="fa fa-lock"></i></div>
                        <div class="feature-content">
                            <h3>Secure your loan</h3>
                            <p>The transactions of loans are done in the safest and secured way possible. </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-4 col-md-4 col-12">
                    <div class="feature mb40">
                        <div class="feature-icon feature-circle"><i class="fa fa-magic"></i></div>
                        <div class="feature-content">
                            <h3>Attractive Rates of Interest</h3>
                            <p>The interests are so lower that you can easily payback your debts without any hasseles.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-space80">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-md-2 col-md-8 offset-md-2 col-md-8 col-sm-12 col-12">
                    <div class="section-title mb60 text-center">
                        <!-- section title start-->
                        <h1>About Education Loan</h1>
                        <p class="lead">No matter how long the student life is, ease it with Borrow student personal Loan. Borrow Student Personal Loan provides you with quick and completely transparent loans to fuel your college life's aspirations and dreams.</p>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="well-box">
                        <h3>Eligibility Criteria</h3>
                        <ul class="listnone bullet bullet-check-circle-default">
                            <li>Resident Of country</li>
                            <li>Required age of 16 to 35</li>
                            <li>Your post completion of Certifiace</li>
                            <li>Write your eligibility criteria</li>
                            <li>Write your eligibility criteria Content</li>
                            <li>Write your eligibility criteria</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="well-box">
                        <h3>Documentes needs</h3>
                        <ul class="listnone bullet bullet-check-circle-default">
                            <li>Passport</li>
                            <li>Voter ID card</li>
                            <li>Driving license</li>
                            <li>PAN card</li>
                            <li>Bank account statement</li>
                            <li>Latest electricity bill</li>
                            <li>Latest mobile/telephone bill</li>
                            <li>Existing house lease agreement</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="well-box">
                        <h3>Reasons for Loans to not get Approved!</h3>
                        <ul class="listnone">
                            <li>1. Douments Uploaded might not be valid.</li>
                            <li>2. Old loans may not be repayed.</li>
                            <li>3. Not Punctual to pay loans on time.</li>
                            <li>4. Credit scores may be low due to late payments.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-space80 bg-light-blue how-it-section">
        <div class="container">
            <div class="row">
                <div class=" offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="section-title mb60 text-center">
                        <!-- section title start-->
                        <h1 class="text-white">Get refinanced in three easy steps</h1>
                        <p> A Clear and simple path to financial freedom.</p>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-12">
                    <div class="how-it-block">
                        <h3 class="how-it-no">1</h3>
                        <div class="how-it-content">
                            <h2 class="text-white">Get approved</h2>
                            <p>Your loans will be approved once all the documents are validated and the old loan is repaid.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-12">
                    <div class="how-it-block">
                        <h3 class="how-it-no">2</h3>
                        <div class="how-it-content">
                            <h2 class="text-white">Select rate and term</h2>
                            <p>You can take loans at the low interest rates. The loan amount will be minimum 3000 and 5000 precisely. </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-12">
                    <div class="how-it-block">
                        <h3 class="how-it-no">3</h3>
                        <div class="how-it-content">
                            <h2 class="text-white">Verify and Get done</h2>
                            <p>Your Documents willl be verified before approving your loans, so please do submit valid documents. </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-4 col-12 text-center mt30">
                </div>
            </div>
        </div>
    </div>
   
   <?php include('includes/footer.php')?>