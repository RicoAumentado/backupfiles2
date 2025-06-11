<?php
include 'connect.php';
    if(isset($_POST['submit'])){
        $gender = $_POST['gender'];
        $sql = "INSERT INTO `radiodata` (gender) VALUES ('$gender')";
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo " Data inserted successfully";
    }else{
        die(mysqli_error($conn));
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

    <title>RADIO</title>
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div>
            <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female

            </div>
            
            <button type="submit" name="submit" class="btn btn-primary my-5">Submit</button>
        </form>

    </div>

</body>

</html>