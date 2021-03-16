<?php

$txtfn = filter_input(INPUT_POST, 'txtfn');
$txtsno = filter_input(INPUT_POST, 'txtsno');
$txtaddress = filter_input(INPUT_POST, 'txtaddress');
$Product = filter_input(INPUT_POST, 'Product');
$dated1 = filter_input(INPUT_POST, date("Y/m/d"));
$txtrateperunit = filter_input(INPUT_POST, 'txtrateperunit');
$txttotalpurhase = filter_input(INPUT_POST, 'txttotalpurhase');
$txttotal = filter_input(INPUT_POST, 'txttotal');

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "Coffee_shop";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if(isset($_POST['insert']))
{
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO supplier_details (S_Name, Mobile_No, Address, Product_Name,Purchasing_date, Rate_Per_Unit, Total_Purchasing, Total)
values ('$txtfn','$txtsno','$txtaddress','$Product','$dated1','$txtrateperunit','$txttotalpurhase','$txttotal')";
if ($conn->query($sql)){
echo "New record is inserted sucessfully";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
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
$sql = "UPDATE supplier_details SET S_Name='$txtfn',Mobile_No='$txtsno', Address='$txtaddress', Product_Name='$Product', Rate_Per_Unit='$txtrateperunit', Total_Purchasing='$txttotalpurhase', Total='$txttotal' WHERE S_Name='$txtfn'";
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

<?php
//SEARCH
// Create connection
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "coffee_shop";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if(isset($_POST['Search']))
{
	$data = getPosts();
    
    $search_Query = "SELECT * FROM supplier_details WHERE S_Name = $txtfn";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $txtfn = $row['S_Name'];
				$txtsno = $row['Mobile_No'];
				$txtaddress = $row['Address'];
				$Product = $row['Product_Name'];
				$txtrateperunit = $row['Rate_Per_Unit'];
				$txttotalpurhase = $row['Total_Purchasing'];
				$txttotal = $row['Total'];
			}
            }else{
            echo 'No Data For This Name';
        }
    }else{
        echo 'Result Error';
    }
}

?>