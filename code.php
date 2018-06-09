<?php
$check = 1;
$pass = 1;
$aadharErr = $fileoneErr = "";
$fname = $lname = $mnumber = $emailid = $dob = $disability = $aadhar = $fincome = $gender = $address = "";


// Personal Information
if($_SERVER["REQUEST_METHOD"] == "POST"){
    global $check, $pass;
    $check = 2;

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mnumber = $_POST['mnumber'];
    $emailid = $_POST['emailid'];
    $dob = $_POST['dob'];
    $disability = $_POST['disability'];
    $aadhar = $_POST['aadhar'];
    $fincome = $_POST['fincome'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    if(!empty($fname)) {
        $fname = test_input($_POST['fname']);
    }
    if(!empty($lname)) {
        $lname = test_input($_POST['lname']);
    }
    if(!empty($mnumber)){
        $mnumber = test_input($_POST['mnumber']);
    }
    if(!empty($emailid)){
        $emailid = test_input($_POST['emailid']);
    }
    if(!empty($dob)){
        $dob = test_input($_POST['dob']);
    }
    if(!empty($disability)){
        $disability = test_input($_POST['disability']);
    }
    if(!empty($aadhar)){
        $sql = "SELECT * from `pinfo` WHERE `aadhar` = '$aadhar'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $aadharErr = "Aadhar No already exists.";
            $check = 0;
        }
        else{
            $aadhar = test_input($_POST['aadhar']);
        }
    }
    if(!empty($fincome)){
        $fincome = test_input($_POST['fincome']);
    }
    if(!empty($gender)){
        $gender = test_input($_POST['gender']);
    }
    if(!empty($address)){
        $address = test_input($_POST['address']);
    }

    $location = 'uploads/';

    $nameone = $_FILES['fileone']['name'];
    $typeone = $_FILES['fileone']['type'];
    $sizeone = $_FILES['fileone']['size'];
    $tmp_nameone = $_FILES['fileone']['tmp_name'];

    $imageFileType = strtolower(pathinfo($location.$nameone, PATHINFO_EXTENSION));

    // Check Size
    if($sizeone > 1000000){
        $fileoneErr = "File Size should not be more than 1MB.";
        $pass=0;
    }
    // Check File Type
    if($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png' && !empty($imageFileType)){
        $fileoneErr = "Only JPG, JPEG & PNG files are allowed only.";
        $pass = 0;
    }
    if(isset($nameone)){
        if(!empty($nameone)){
            if($pass==1){
                if(move_uploaded_file($tmp_nameone, $location.$nameone)){
                    echo "Uploaded";
                }
                else {
                    $fileoneErr = "There was an error uploading your file.";
                }
            }
        }
        else{
            $fileoneErr = "Please choose a file.";
        }
    }
}
// Function for Form data Validation
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($check == 2 && $pass==1){
    $sql = "INSERT INTO `pinfo` (fname, lname, mnumber, emailid, dob, disability, aadhar, fincome, gender, address) VALUES ('$fname', '$lname', '$mnumber', '$emailid', '$dob', '$disability', '$aadhar', '$fincome', '$gender', '$address')";
    if($conn->query($sql) === TRUE){
        echo "New records created successfully";
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
