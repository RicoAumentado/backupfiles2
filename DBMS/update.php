<?php
include 'connect.php';

$id = $_GET['updateid'];
$sql = "SELECT * FROM `seriescrud` WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$firstname = $row['firstname'];
$lastname = $row['lastname'];
$email = $row['email'];
$mobile = $row['mobile'];
$datas = $row['multipledata'];
$gender = $row['gender'];
$skills = explode(",", $datas);

if (isset($_POST['update'])) {
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $datas = isset($_POST['skills']) ? implode(",", $_POST['skills']) : "";

    $sql = "UPDATE `seriescrud` SET 
        firstname='$firstname', 
        lastname='$lastname', 
        email='$email', 
        mobile='$mobile',
        gender='$gender',
        multipledata='$datas' 
        WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location: read.php');
        exit();
    } else {
        die("Update failed: " . mysqli_error($conn));
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UPDATE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <h2 class="mb-4">Update Record</h2>

            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="firstName" value="<?php echo $firstname; ?>" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="lastName" value="<?php echo $lastname; ?>" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" name="mobile" value="<?php echo $mobile; ?>" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Subjects</label><br>
                <?php
                $allSubjects = ['JavaScript', 'HTML', 'CSS'];
                foreach ($allSubjects as $subject) {
                    $checked = in_array($subject, $skills) ? 'checked' : '';
                    echo "<label class='mr-3'><input type='checkbox' name='skills[]' value='$subject' $checked> $subject</label>";
                }
                ?>
            </div>

            <div class="form-group">
                <label>Gender</label><br>
                <label class="mr-3"><input type="radio" name="gender" value="male" <?php if ($gender == 'male') echo 'checked'; ?>> Male</label>
                <label><input type="radio" name="gender" value="female" <?php if ($gender == 'female') echo 'checked'; ?>> Female</label>
            </div>

            <button type="submit" class="btn btn-dark my-3" name="update">Update</button>
        </form>
    </div>
</body>
</html>
