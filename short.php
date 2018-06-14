<?php
//**************** Make Connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "abily";
// Create Connection
$conn = new mysqli("$servername", "$username", "$password", "$dbname");
// Check Connection
if($conn->connect_error){
    die("Connection failed." . $conn->connect_error);
}
else {
    // echo "Connected Successfully";
}

//***************** SELECT from database
$sql = "SELECT * from `pinfo` WHERE `aadhar` = '$aadhar'";
$result = $conn->query($sql);
if($result->num_rows > 0){
  //code
}

//**************** Fetch from database
$sql = "SELECT * from `pinfo`";
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $id = $row['id'];
        $fname = $row['fname'];
        $lname = $row['lname'];
    }
}
else{
    echo "0 results";
}

//*************** Insert into database
$sql = "INSERT INTO `pinfo` (fname, lname, mnumber) VALUES ('$fname', '$lname', '$mnumber')";
if($conn->query($sql) === TRUE){
    echo "New records created successfully";
}
else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//*************** Email Validation
if (!filter_var($emailid, FILTER_VALIDATE_EMAIL)){
    $emailidErr = "Invalid email format"; 
}

// ************* Function for Slashing redundant
function test_input($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

// ********* Regex 
function letters_spaces($data){
	if(!preg_match("/^[a-zA-Z ]+$/", $data)){
		return "Only Letters and Spaces are allowed.";
	}
	return "";
}
function numbers_decimal($data){
	if(!preg_match("/^[0-9]*\.?[0-9]*$/", $data)){
		return "Only Numbers and a decimal are allowed.";
	}
	return "";
}
if(isset($_POST["submit"])){}
if(strlen($aadhar) < 12){}

$imageFileType = strtolower(pathinfo($location.$name, PATHINFO_EXTENSION));

if(move_uploaded_file($tmp_name, $location.$name)){}


?>




