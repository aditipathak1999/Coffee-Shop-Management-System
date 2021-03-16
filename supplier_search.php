<?php
if(isset($_POST['search']))
{
$txtfn=$_POST["txtfn"];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffee_shop";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql =("SELECT * FROM supplier_details WHERE S_Name = '$txtfn'");
$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);
if(!$row)
{
	echo "<script> alert('Record NOT Found');</script>";
}

mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
    <title>Supplier Details</title>
    <script language="javascript">
                function multiNumbers()
                {
                        var val1 = parseInt(document.getElementById("value1").value);
                        var val2 = parseInt(document.getElementById("value2").value);
                        var ansD = document.getElementById("total");
                        ansD.value = val1 * val2;
                }
function check()
{

    var mobile = document.getElementById('mobile');
   
    
    var message = document.getElementById('message1');

   var goodColor = "#0C6";
    var badColor = "#FF9B37";
  
    if(mobile.value.length!=10){
       
        mobile.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "required 10 digits, match requested format!"
    }
else
{mobile.style.backgroundColor = goodColor;
        message.style.color = goodColor;
message.innerHTML="correct format!"}}

function allLetter()
      { var name = document.getElementById('name');
var message = document.getElementById('message');

      var letters = /^[A-Za-z\s]+$/;
var goodColor = "#0C6";
    var badColor = "#FF9B37";
      if(name.value.match(letters))
      {name.style.backgroundColor = goodColor;
        message.style.color = goodColor;
message.innerHTML="correct format!"
      }
      else
      {name.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "incorrect format"; }
      }
        </script>
	<style>
        #btn1
        {
            background-color: #a38560;
            background-image: linear-gradient(315deg, #a38560 0%, #e0d4ae 74%);
            color:black;
            padding:5px;
            font-size: 18px;
            cursor: pointer;
            margin: 13px;
        }
        #tableaddress
        {
            background-color: #ffffff;
            background-image: linear-gradient(315deg, #ffffff 0%, #cea177 74%);
            border-radius:10px ;
            transform: translate(5%,-10%);
        }
    </style>
    <link rel="stylesheet" type="text/css" href="c_details.css"/>
</head>
<body onload="doOnLoad();" bgcolor="#fff8dc">

<form name="personal" action="" onsubmit="" method="post" autocomplete="on">
    <table id="tableaddress" align="center" width="50%" cellspacing="4" cellpadding="20" border="5">
        <tr>
            <td colspan="4" align="center" style="font-family: cooper; "><font size="6"><b>Supplier Details</b></font></td>
        </tr>
        <tr>
            <td>Supplier Name:<span style="color:red">*</span></td>
            <td colspan="3"><input type="text" name="txtfn"  size="10">
			 <button name="search" value="Search"  id="btn1"  style="width:100px; height: 40px;">Search</button>
			 <button name="home" value="home"  id="btn1"  style="width:100px; height: 40px;"><a href="MDI.html">Home</a></button>
               
            </td>
        </tr>
		<?php
			if(isset($_POST['search']))
			{
		?>
		<tr>
            <td> Name<span style="color:red">*</span>
			<td colspan="2"><input type="text" id="name" name="txtfn" size="30" required onkeyup="allLetter();" value="<?php echo $row['S_Name'];?>"><span id="message"></span>
			</td>
      
        </tr>
		<tr>
			<td>Mobile Number<span style="color:red">*</span></td>
			<td colspan="2"><input type="number" id= "mobile" name="txtsno" size="30" required onkeyup="check();" value="<?php echo $row['Mobile_No'];?>" ><span id="message1"></span></td>
		</tr>
		<tr>
           <td >Address<span style="color:red">*</span></td>
		   <td colspan="2"><input type="text" name="txtaddress" size="30" style="height: 30px;"  value="<?php echo $row['Address'];?>"></td>
		</tr>
		<tr>
           <td >Product Name<span style="color:red">*</span></td>
		   <td colspan="2"> <select name="Product" style="width: 30%;" >
					<option  value=""></option>
                    <option value="Milk">Milk</option>
                    <option value="Coffee">Coffee Powder</option>
					<option value="Tea">Tea Powder</option>
					<input type="text" id= "product" name="product" size="20" value="<?php echo $row['Product_Name'];?>" Disabled ></td>
                </select></td>
		  </tr>
		  <tr>
            <td>Purchaising Date<span style="color:red" >*</span></td>
            <td colspan="2"><input type="date" name="dated" value="<?php echo $row['Purchasing_date'];?>"></td>
		</tr>
		<tr>
           <td >Rate Per Unit<span style="color:red">*</span></td>
		   <td><input type="number" id="value1" name="txtrateperunit" value="<?php echo $row['Rate_Per_Unit'];?>"/></td>
		   <td>Total Purchasing<span style="color:red">*</span><input type="number" id="value2" name="txttotalpurhase" value="<?php echo $row['Total_Purchasing'];?>"/>
		    <input type="button" name="Sumbit" value="+" onclick="javascript:multiNumbers()"/>
		  </tr>
		  
		 <tr>
           <td >Total<span style="color:red">*</span></td>
		   <td colspan="2"><input type="number" id="total" name="txttotal" value="<?php echo $row['Total'];?>"/></td>
		  </tr>
		  <tr>
            <td colspan="3" align="center">
				<button value="Update" id="btn1" name="update" style="width:120px; height: 40px;">Update</button>&nbsp;&nbsp;&nbsp;
				<button value="delete" id="btn1" name="delete" style="width:120px; height: 40px;">Delete</button>&nbsp;&nbsp;&nbsp;
        </tr>
		<?php
			}
		?>
		</table>
	<br>
	<br>
	<br>
	<br>
	<br>
	  
</form>

<?php
if (isset($_POST['update']))
{
$txtfn = $_POST['txtfn'];
$txtsno = $_POST['txtsno'];
$txtaddress = $_POST['txtaddress'];
$Product = $_POST['Product'];
$dated1 = date('y-m-d', strtotime($_POST['dated']));
$txtrateperunit = $_POST['txtrateperunit'];
$txttotalpurhase = $_POST['txttotalpurhase'];
$txttotal = $_POST['txttotal'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffee_shop";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql=("Update supplier_details SET Mobile_No='$txtsno', Address='$txtaddress', Product_Name='$Product',Purchasing_date='$dated1', Rate_Per_Unit='$txtrateperunit', Total_Purchasing='$txttotalpurhase', Total='$txttotal' WHERE S_Name='$txtfn'");
	if (mysqli_query($conn, $sql)) {
		echo	"Updated Successful";
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>
<?php
if (isset($_POST['delete']))
{
$txtfn = $_POST['txtfn'];
$txtsno = $_POST['txtsno'];
$txtaddress = $_POST['txtaddress'];
$Product = $_POST['Product'];
$dated1 = date('y-m-d', strtotime($_POST['dated']));
$txtrateperunit = $_POST['txtrateperunit'];
$txttotalpurhase = $_POST['txttotalpurhase'];
$txttotal = $_POST['txttotal'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffee_shop";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql=("Delete from supplier_details where S_Name='$txtfn'");	
	if (mysqli_query($conn, $sql)) {
		echo	"Delete Successful";
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>


</body>
</html>