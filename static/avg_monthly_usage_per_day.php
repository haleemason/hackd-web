<html>
<body>

<?php
$servername = "removed";
$username = "removed";
$password = "removed";
$dbname = "removed";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT * FROM clients_per_day";

$sql = "SELECT MONTH(Time) as Month, ROUND(AVG(`Download (B)`), 2) as monthly_avg_download_b, ROUND(AVG(`Total (B)`), 2 ) as monthly_avg_total_b  FROM hackd.usage_over_time  group by MONTH";

$result = $conn->query($sql);

$rows = array();
while($r = mysqli_fetch_assoc($result)) {
   $rows[] = $r;
 }
print json_encode($rows);


// echo json_encode($rows);

// if ($result->num_rows > 0) {
//     // output data of each row
//     echo '{ "data": [';
//     while($row = $result->fetch_assoc()) {
//       echo '{';
//         echo '"date":';
//         echo '"';
//         echo $row['Time'];
//         echo '",';
//         echo '"client":';
//         echo '"';
//         echo  $row['# Clients'];
//         echo '"';
//       echo '},';
//     }
//     echo ']}';
//
// } else {
//     echo "0 results";
// }

$conn->close();
?>

</body>
</html>