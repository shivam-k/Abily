<?php


//**********Make Connection
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

?>
