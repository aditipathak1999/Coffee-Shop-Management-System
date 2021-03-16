<?php
$txtcusid = filter_input(INPUT_POST, 'txtcusid');
$txtavalable = filter_input(INPUT_POST, 'txtavalable');
$txtname = filter_input(INPUT_POST, 'txtname');
$Gender = filter_input(INPUT_POST, 'Gender');
$txtmno = filter_input(INPUT_POST, 'txtmno');
$Order = filter_input(INPUT_POST, 'Order');
$txtrateperunit = filter_input(INPUT_POST, 'txtrateperunit');
$txttotalpurhase = filter_input(INPUT_POST, 'txttotalpurhase');
$txttotal = filter_input(INPUT_POST, 'txttotal');

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "coffee_shop";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO cust_bill (cus_id, available, cust_name, gender, mobile_no, c_order, rateperunit, totalpurchase, total)
values ('$txtcusid','$txtavalable','$txtname','$Gender','$txtmno','$Order','$txtrateperunit','$txttotalpurhase','$txttotal')";
if ($conn->query($sql)){
echo "New record is inserted sucessfully";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
?>