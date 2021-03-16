<?php
$Product = filter_input(INPUT_POST, 'Product');
$txtnooflitre = filter_input(INPUT_POST, 'txtnooflitre');
$txtnoofcups = filter_input(INPUT_POST, 'txtnoofcups');
$txtrateperunit = filter_input(INPUT_POST, 'txtrateperunit');


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
$sql = "INSERT INTO stock_details(Product_Name , No_Of_litre, No_Of_Cups, Cost_Per_Cups)
values ('$Product','$txtnooflitre','$txtnoofcups','$txtrateperunit')";
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
<?php
//UPDATE
// Create connection
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "coffee_shop";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if(isset($_POST['update']))
{
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "UPDATE stock_details SET Product_Name='$Product',No_Of_litre='$txtnooflitre', No_Of_Cups='$txtnoofcups', Cost_Per_Cups='$txtrateperunit' WHERE Product_Name='$Product'";
if ($conn->query($sql)){
echo "record is Updated sucessfully";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
?>