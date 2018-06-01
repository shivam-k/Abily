<?php

$location = 'uploads/';

$name = $_FILES['file']['name'];
$type = $_FILES['file']['type'];
$size = $_FILES['file']['size'];
$tmp_name = $_FILES['file']['tmp_name'];

$max_size = 1000000;

$imageFileType = strtolower(pathinfo($location.$name, PATHINFO_EXTENSION));

$pass = 1;

// Check File Size
if(!empty($name)) {
    if($size > 1000000){
        echo "File Size should not be more than 1 MB.";
        $pass=0;
    }
}

//Check File type
if(!empty($name)) {
    if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png"){
        echo "Only JPG,JPEG & PNG files are allowed.";
        $pass=0;
    }
}

if(isset($name)){
    if(!empty($name)){
        if($pass==1){
            if(move_uploaded_file($tmp_name, $location.$name)){
                echo 'Uploaded';
            }
            else{
                echo 'There was an error uploading your file.';
            }
        }
    }
    else{
        echo "Please choose a file.";
    }
}
?>

<form action="test.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file"><br><br>
    <input type="submit" value="Submit">
</form>
