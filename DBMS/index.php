<?php
    include 'connect.php';
    if(isset($_POST['submit'])){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $mobileNumber = $_POST['mobile'];
        $gender = $_POST['gender'];
        $allData = isset($_POST['skills']) ? implode(",", $_POST['skills']) : "";


        $sql = "INSERT INTO `seriescrud` (firstName, lastName, email, mobile, multipledata,gender)
        VALUES ('$firstName', '$lastName', '$email', '$mobileNumber', '$allData','$gender')";


        $result = mysqli_query($conn, $sql);
        if($result) {
            header('location: read.php'); 

        }else {
            die("Query failed: " . mysqli_error($conn));
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>INDEX</title>
</head>

<body>
<div class="container my-5">
        <form method="post">
            <h1 class="text-center mb-5">PHP CRUD</h1>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" placeholder="First Name" name="firstName">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" placeholder="Last Name" name="lastName" >
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email" >
            </div>
            <div class="form-group">
                <label>Mobile Number</label>
                <input type="text" class="form-control" placeholder="Mobile Number" name="mobile" autocomplete="off">
            </div>

            <div>
                <div class="input-group-text">
                    <input type="checkbox" name="skills[]" value="JavaScript" aria-label="Checkbox for JavaScript">JavaScript 
                    <input type="checkbox" name="skills[]" value="HTML" aria-label="Checkbox for HTML"> HTML
                    <input type="checkbox" name="skills[]" value="CSS" aria-label="Checkbox for CSS"> CSS
                </div>
            </div>
            <div class="my-3">
                GENDER:
            <input type="radio" name="gender" value="male"> Male
            <input type="radio" name="gender" value="female"> Female
            </div>


            <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
        </form>
    </div>

</body>

</html>