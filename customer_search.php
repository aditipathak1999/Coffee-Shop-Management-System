<?php
if(isset($_POST['search']))
{
$txtcusid=$_POST["txtcusid1"];


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

$sql =("SELECT * FROM cust_bill WHERE cus_id = '$txtcusid'");
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
 
    <title>Customer Billing</title>
    <script language="javascript">
                function multiNumbers()
                {
                        var val1 = parseInt(document.getElementById("value1").value);
                        var val2 = parseInt(document.getElementById("value2").value);
                        var ansD = document.getElementById("total");
                        ansD.value = val1 * val2;
                }

function check1()
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
var message = document.getElementById('message5');

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
        </script>
	<style>
       #btn1
    {
    background-color: gray;
    background-image: linear-gradient(315deg, gray 0%, #e0d4ae 74%);
    color:black;
    padding:5px;
    font-size: 18px;
    cursor: pointer;
    margin: 13px;
    }
	
   #tableaddress
    {
    background-color:rgb(0,0,0,0.5);
    border-radius:10px ;
    transform: translate(5%,0%)
    </style>
    <link rel="stylesheet" type="text/css" href="c_details.css"/>
</head>
<body onload="doOnLoad();" bgcolor="#fff8dc">

<form name="personal" action="" onsubmit="" method="post" autocomplete="on">
    <table id="tableaddress" align="center" width="50%" cellspacing="4" cellpadding="20" border="5">
        <tr>
            <td colspan="4" align="center" style="font-family: cooper; "><font size="6"><b>Customer Details</b></font></td>
        </tr>
        <tr>
            <td>Customer Id:<span style="color:red">*</span></td>
            <td colspan="3"><input type="text" name="txtcusid1"  size="10">
			 <button name="search" value="Search"  id="btn1"  style="width:100px; height: 40px;">Search</button>
			<button name="home" value="home"  id="btn1"  style="width:100px; height: 40px;"><a href="MDI.html">Home</a></button>
               
            </td>
        </tr>
		<?php
			if(isset($_POST['search']))
			{
		?>
		<tr>
            <td>Customer Id<span style="color:red">*</span></td>
            <td><input type="text" name="txtcusid"size="10" value="<?php echo $row['cus_id'];?>"></td>
			<td colspan="2">Date<span style="color:red">*</span><input type='date' id='hasta' name="dated" value="<?php echo $row['Cust_date'];?>"></td>
        </tr>
        <tr>
            <td>Name<span style="color:red">*</span></td>
			<td colspan="3"><input type="text" id="name" name="txtname" size="30" required onkeyup="allLetter();" value="<?php echo $row['cust_name'];?>"><span id="message5"></td>
			
            </tr>
        <tr>
            <td>Gender<span style="color:red">*</span></td>
            <td colspan="2"><input type="text" name="Gender" value="<?php echo $row['gender']?>" ></td>
		<td>Mobile Number<span style="color:red">*</span><br><input type="number" id= "mobile" name="txtmno" size="30" required onkeyup="check1();" value="<?php echo $row['mobile_no'];?>" ><span id="message1"></td>
        </tr>
        <tr>
           <td >Order<span style="color:red">*</span><br><td> <input type="text" name="C_order" value="<?php echo $row['c_order']?>" ></td>
			<td >Rate<span style="color:red">*</span><input type="number" id="value1" name="txtrateperunit" value="<?php echo $row['rateperunit'];?>"/></td>
		   <td colspan="2">No.of cups<span style="color:red">*</span><input type="number" id="value2" name="txttotalpurhase" style="width: 70%" value="<?php echo $row['totalpurchase'];?>"/>
		    <input type="button" name="Sumbit" value="+" onclick="javascript:multiNumbers()"/></td>
		  </tr>
		  <tr>
           <td >Total<span style="color:red">*</span></td>
		   <td colspan="4"><input type="number" id="total" name="txttotal" value="<?php echo $row['total'];?>"/></td>
		  </tr>
		  <tr>
            <td colspan="3" align="center">
				<button value="Update" id="btn1" name="update" style="width:120px; height: 40px;">Update</button>&nbsp;&nbsp;&nbsp;
				<button value="delete" id="btn1" name="delete" style="width:120px; height: 40px;">Delete</button>&nbsp;&nbsp;&nbsp;</td>
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

$txtcusid = $_POST['txtcusid'];
$dated1 = date('y-m-d', strtotime($_POST['dated']));
$txtname =$_POST['txtname']; 
$Gender = $_POST['Gender'];
$txtmno = $_POST['txtmno'];
$Order = $_POST['C_order'];
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

$sql=("Update cust_bill SET  Cust_date='$dated1',cust_name='$txtname', gender='$Gender', mobile_no='$txtmno', c_order='$Order', rateperunit='$txtrateperunit', totalpurchase='$txttotalpurhase', total='$txttotal' WHERE cus_id='$txtcusid'");
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

$txtcusid = $_POST['txtcusid'];
$dated1 = date('y-m-d', strtotime($_POST['dated']));
$txtname =$_POST['txtname']; 
$Gender = $_POST['Gender'];
$txtmno = $_POST['txtmno'];
$Order = $_POST['C_order'];
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

$sql=("Delete from cust_bill where cus_id='$txtcusid'");	
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