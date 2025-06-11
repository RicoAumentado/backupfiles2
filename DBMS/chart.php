<?php
include 'connect.php';

// Query gender count
$sql = "SELECT gender, COUNT(*) AS count FROM seriescrud GROUP BY gender";
$result = mysqli_query($conn, $sql);

$dataPoints = [];
while ($row = mysqli_fetch_assoc($result)) {
    $dataPoints[] = [
        "label" => ucfirst($row['gender']),
        "y" => (int)$row['count']
    ];
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Gender Statistics</title>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script>
window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
            text: "Gender Distribution"
        },
        data: [{
            type: "pie",
            startAngle: 240,
            indexLabel: "{label} - {y} users",
            yValueFormatString: "#,##0",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
}
</script>
</body>
</html>
