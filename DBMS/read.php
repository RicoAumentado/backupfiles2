<?php
include 'connect.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>READ</title>


</head>

<body>
    <div class="container my-5">
    <table class="table">
        <thead class = "thead-dark">
            <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Subjects</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Operations</th>
                    
            </tr>
        </thead>
        <tbody>
    <?php
        $sql = "SELECT * FROM `seriescrud`";
        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $firstName = $row['firstname'];
            $lastName = $row['lastname'];
            $email = $row['email'];
            $mobileNumber = $row['mobile'];
            $datas = $row['multipledata'];
            
            $gender = $row['gender'];
            //$allData = explode(",", $datas);
            echo '<tr>
            <th scope="row">'.$id.'</th>
            <td>'.$firstName.'</td>
            <td>'.$lastName.'</td>
            <td>'.$email.'</td>
            <td>'.$mobileNumber.'</td>
            <td>'.$datas.'</td>
            <td>'.$gender.'</td>
            <td>
                <a class="btn btn-warning btn-sm" href="update.php?updateid='.$id.'">Update</a>
                <a class="btn btn-danger btn-sm" href="delete.php?deleteid='.$id.'">Delete</a>
            </td>
        </tr>';
        
        }
    ?>




        </tbody>
    </table>
    </div>
    
</body>

</html>