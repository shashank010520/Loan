<?php
// connect to the database
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = mysqli_connect('localhost', 'root', '', 'loan');

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $type=$_GET['type'];
    lid:
    $lid="LOAN".rand(1000,9999);
    $str="select * from loans_applied where l_id='$lid'";
    $res=mysqli_query($con,$str);
    if(mysqli_num_rows($res)>0)
    {
        goto lid;
    }
    
    $hreport=$_FILES['hreport']['name'];
    $name=$_POST['name'];  
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $addr=$_POST['address'];
    $amt=$_POST['amount'];
    $date=date('Y-m-d');
    $status="Pending";
    // destination of the file on the server
    $hreport_destination = 'uploads/hreport/' . $hreport;

    // get the file extension
    $hreport_extension = pathinfo($hreport, PATHINFO_EXTENSION);
    $extension=array($hreport_extension);
    // the physical file on a temporary uploads directory on the server 
    $hreport_tmp = $_FILES['hreport']['tmp_name'];
    $hreport_size = $_FILES['hreport']['size'];
    
    if ( ($hreport_extension!='pdf')){
        echo "You file extension must be  .pdf";
    }elseif ($hreport_size > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($hreport_tmp, $hreport_destination)) {
            $sql = "INSERT INTO loans_applied (l_id, l_type, a_name, a_email, amount, l_date, status) VALUES ('$lid', '$type', '$name', '$email', $amt, '$date', '$status')";
         (mysqli_query($conn, $sql));
         $sql1= "INSERT INTO hreport_table(ea_email, l_id, hreport) VALUES ('$email', '$lid', '$hreport')";
         mysqli_query($conn, $sql1);
         $sql2= "INSERT INTO payment_status VALUES ('$lid', '$email', 'Pending')";
         mysqli_query($conn, $sql2); 
         echo "<script>alert('Loan Submitted Successfully!');</script>"; 
         echo "<script>location.href='applied-loan.php';</script>";
 } else {
     echo "Failed to upload file.";
 }}
}