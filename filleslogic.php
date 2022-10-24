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
    $str="select * from documents where a_email='$email'";
            $res=mysqli_query($con,$str);
            $name=$_POST['name'];  
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $addr=$_POST['address'];
    $amt=$_POST['amount'];
    $date=date('Y-m-d');
    $status="Pending";
            if(mysqli_num_rows($res)==0)
            {
               
    $adhar = $_FILES['adhar']['name'];
    $photo = $_FILES['photo']['name'];
    $passbook = $_FILES['passbook']['name'];
    $pan = $_FILES['pan']['name'];
    $adr_proof = $_FILES['adr_proof']['name'];
    $clg_id = $_FILES['clg_id']['name'];      
    // destination of the file on the server
    $pb_destination = 'uploads/pb/' . $passbook;
    $adhar_destination = 'uploads/adhar/' . $adhar;
    $addr_destination = 'uploads/address/' . $adr_proof;
    $pan_destination = 'uploads/pan/' . $pan;
    $cid_destination = 'uploads/cid/' . $clg_id;
    $photo_destination = 'uploads/photo/' . $photo;

    // get the file extension
    $pb_extension = pathinfo($passbook, PATHINFO_EXTENSION);
    $adhar_extension = pathinfo($adhar, PATHINFO_EXTENSION);
    $addr_extension = pathinfo($adr_proof, PATHINFO_EXTENSION);
    $pan_extension = pathinfo($pan, PATHINFO_EXTENSION);
    $cid_extension = pathinfo($clg_id, PATHINFO_EXTENSION);
    $photo_extension = pathinfo($photo, PATHINFO_EXTENSION);
    $extension=array($pb_extension,$adhar_extension,$addr_extension,$pan_extension,$cid_extension);
    // the physical file on a temporary uploads directory on the server
    $adhar_tmp = $_FILES['adhar']['tmp_name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $passbook_tmp = $_FILES['passbook']['tmp_name'];
    $pan_tmp = $_FILES['pan']['tmp_name'];
    $adr_proof_tmp = $_FILES['adr_proof']['tmp_name'];
    $clg_id_tmp = $_FILES['clg_id']['tmp_name']; 

    $adhar_size = $_FILES['adhar']['size'];
    $photo_size = $_FILES['photo']['size'];
    $passbook_size = $_FILES['passbook']['size'];
    $pan_size = $_FILES['pan']['size'];
    $adr_proof_size = $_FILES['adr_proof']['size'];
    $clg_id_size = $_FILES['clg_id']['size'];
    if (($pb_extension!='pdf') or ($adhar_extension!='pdf') or ($addr_extension!='pdf') or ($pan_extension!='pdf') or ($cid_extension!='pdf')){
        echo "You file extension must be  .pdf";
    } else if (!in_array($photo_extension, ['jpg','png','jpeg','gif'])) {
        echo "You file extension must be .jpg, .png, .jpeg or .gif";
    }elseif ($adhar_size > 1000000 or $photo_size > 1000000 or $passbook_size > 1000000 or $clg_id_size > 1000000 or $pan_size > 1000000 or $adr_proof_size > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($adhar_tmp, $adhar_destination) and move_uploaded_file($photo_tmp, $photo_destination) and move_uploaded_file($passbook_tmp, $pb_destination) and move_uploaded_file($pan_tmp, $pan_destination) and move_uploaded_file($adr_proof_tmp, $addr_destination) and move_uploaded_file($clg_id_tmp, $cid_destination)) {
            $sql = "INSERT INTO loans_applied(l_id, l_type, a_name, a_email, amount, l_date, status) VALUES ('$lid', '$type', '$name', '$email', $amt, '$date', '$status')";
            mysqli_query($conn, $sql);           
                $sql1 = "INSERT INTO documents(a_email, a_aadhar, a_photo, a_addressproof, a_cidproof, a_pan, a_passbook) VALUES ('$email', '$adhar', '$photo', '$adr_proof', '$clg_id', '$pan', '$passbook')";
                mysqli_query($conn, $sql1);                              
                echo "<script>alert('Loan Submitted Successfully!');</script>"; 
                echo "<script>location.href='applied-loan.php';</script>";
        } else {
            echo "Failed to upload file.";
        }
    }
    }else{
        $sql = "INSERT INTO loans_applied(l_id, l_type, a_name, a_email, amount, l_date, status) VALUES ('$lid', '$type', '$name', '$email', $amt, '$date', '$status')";
            mysqli_query($conn, $sql); 
                                         
            echo "<script>alert('Loan Submitted Successfully!');</script>"; 
                echo "<script>location.href='applied-loan.php';</script>";

    }
}