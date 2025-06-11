<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    if (isset($_POST['skills']) && is_array($_POST['skills'])) {
        $datas = $_POST['skills'];
        $allData = implode(",", $datas);
        //echo $allData;

        $sql = "INSERT INTO `multipledata` (checkboxData) VALUES ('$allData')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo " Data inserted successfully";
        } else {
            die(mysqli_error($conn));
        }
    } else {
        echo "No checkbox was selected.";
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

    <title>Checkbox</title>
</head>

<body>
    <div class="container my-5">
    <form method="POST">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="checkbox" name="skills[]" value="JavaScript" aria-label="Checkbox for JavaScript"> JavaScript
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="checkbox" name="skills[]" value="HTML" aria-label="Checkbox for HTML"> HTML
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="checkbox" name="skills[]" value="CSS" aria-label="Checkbox for CSS"> CSS
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
</form>

    </div>


</body>

</html>