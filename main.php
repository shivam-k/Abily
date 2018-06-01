<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Scholarship Form</title>

    <style type="text/css">
        input::-webkit-input-placeholder {
            font-size: 12px;
            }
            #example2 {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
    </style>

</head>

<body style="background-color: #E7EBF3">

<!-- PHP Codes -->
<?php
    require 'dbconn.php';
    require 'code.php';
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10"  id="example2">

            <!-- Header -->
            <div class="row text-center text-white pt-5 pb-4 px-5" style="background-color: #004b8b">
                <h1>SCHOLARSHIP REGISTRATION FORM Academic Year 2017 / 2018</h1>
                <p class="text-left">To register for EISB Scholarships, please fill in this registration form. EISB Admissions office will contact you directly with information on application process and will send you an application form. You will be kindly required to provide all necessary information and supply EISB with relevant documentation to proceed further in scholarship application process.</p>
            </div>

            <!-- Form -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <!-- Personal Information -->
                <div class="row p-5" style="background-color: #FFFFFF">
                     <div class="w-100"></div>
                    <div class="col-md-auto">
                        <h6 class="border-bottom border-info font-weight-bold">PERSONAL DETAILS</h6>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-lg-4 px-4 py-4 my-4" style="background-color: #E7EBF3">
                        <label>FIRST NAME <span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo $fname ?>" class="form-control" name="fname" placeholder="Your answer" required>
                        <small class="form-text text-muted">We'll never share your email.</small>
                    </div>
                    <div class="col-lg-4 px-4 py-4 my-4" style="background-color: #E7EBF3">
                        <label>LAST NAME <span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo $lname ?>" class="form-control" name="lname" placeholder="Your answer" required>
                    </div>
                    <div class="col-lg-4 px-4 py-4 my-4" style="background-color: #E7EBF3">
                        <label>MOBILE NUMBER <span class="text-danger">*</span></label>
                        <input type="number" value="<?php echo $mnumber ?>" class="form-control" name="mnumber" placeholder="Your answer" required>
                    </div>
                    <div class="col-lg-4 px-4 py-4 my-4" style="background-color: #E7EBF3">
                        <label>EMAIL ID <span class="text-danger">*</span></label>
                        <input type="email" value="<?php echo $emailid ?>" class="form-control" name="emailid" placeholder="Your answer" required>
                    </div>
                    <div class="col-lg-4 px-4 py-4 my-4" style="background-color: #E7EBF3">
                        <label>DATE OF BIRTH <span class="text-danger">*</span></label>
                        <input type="date" value="<?php echo $dob ?>" class="form-control" name="dob" placeholder="Your answer" required>
                    </div>
                    <?php $color = "#E7EBF3"; ?>
                    <div class="col-lg-4 px-4 py-4 my-4" style="background-color: <?php echo $color; ?>">
                        <label>DISABILITY TYPE <span class="text-danger">*</span></label>
                        <select class="form-control" name="disability" placeholder="Select Disability Type" required>
                            <option>Physical Disability</option>
                            <option>Visual Disability</option>
                            <option>Hearing Disability</option>
                            <option>Mental Health Disability</option>
                            <option>Intellectual Disability</option>
                            <option>Learning Disability</option>
                            <option>Other</option>
                        </select>
                        <small class="text-danger"><?php echo $disabilityErr; ?></small>
                    </div>
                    <div class="col-lg-4 px-4 py-4 my-4" style="background-color: #E7EBF3">
                        <label>AADHAR NUMBER <span class="text-danger">*</span></label>
                        <input type="number" value="<?php echo $aadhar; ?>" class="form-control" name="aadhar" placeholder="Your answer" required>
                        <small class="text-danger"><?php echo $aadharErr; ?></small>
                    </div>
                    <div class="col-lg-4 px-4 py-4 my-4" style="background-color: #E7EBF3">
                        <label>ANNUAL FAMILY INCOME <span class="text-danger">*</span></label>
                        <input type="number" value="<?php echo $fincome ?>" class="form-control" name="fincome" placeholder="Your answer" required>
                    </div>
                    <div class="col-lg-4 px-4 py-4 my-4" style="background-color: #E7EBF3">
                        <label>GENDER <span class="text-danger">*</span></label>
                        <select class="form-control" name="gender" placeholder="Select Gender" required>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                        <small class="text-danger"><?php echo $genderErr; ?></small>
                    </div>
                    <div class="col-lg-12 px-4 py-4 my-4" style="background-color: #E7EBF3">
                        <label>ADDRESS <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="address" rows="2"><?php echo $address; ?></textarea>
                    </div>
                </div>

                <!-- Documents -->
                <div class="row p-5" style="background-color: #E7EBF3;">
                    <div class="col-md-auto">
                        <h6 class="border-bottom border-info font-weight-bold">DOCUMENTS</h6>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-lg-6 px-4 py-4 my-4" style="background-color: #FFFFFF">
                        <label>DISABILITY CERTIFICATE <span class="text-danger">*</span></label>
                        <input type="file" class="form-control-file" name="fileone" required>
                        <small class="text-danger"><?php echo $fileoneErr; ?></small>
                    </div>
                    <div class="col-lg-6 px-4 py-4 my-4" style="background-color: #FFFFFF">
                        <label>SCANNED PHOTOGRAPH <span class="text-danger">*</span></label>
                        <input type="file" class="form-control-file" name="filetwo">
                    </div>
                    <button type="submit" name="submit" class="btn btn-outline-primary btn-lg">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
