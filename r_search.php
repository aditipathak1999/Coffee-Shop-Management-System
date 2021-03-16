<?php
if(isset($_POST['search']))
{
$txtempid=$_POST["txtempid1"];


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

$sql =("SELECT * FROM registration_form WHERE Employee_Id = '$txtempid'");
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
            <td colspan="4" align="center" style="font-family: cooper; "><font size="6"><b>Registration Details</b></font></td>
        </tr>
        <tr>
            <td>Employee_Id:<span style="color:red">*</span></td>
            <td colspan="3"><input type="text" name="txtempid1"  size="10">
			 <button name="search" value="Search"  id="btn1"  style="width:100px; height: 40px;">Search</button>
			 <button name="home" value="home"  id="btn1"  style="width:100px; height: 40px;"><a href="MDI.html">Home</a></button>
               
            </td>
        </tr>
		<?php
			if(isset($_POST['search']))
			{
		?>
		<tr>
		 <td>Employee_Id:<span style="color:red">*</span></td>
            <td colspan="3"><input type="text" name="txtempid"  size="10" value="<?php echo $row['Employee_Id'];?>">
		</tr>	
		 <tr>
            <td>First Name<span style="color:red">*</span><br><input type="text" id="name" name="txtfn" size="30" required onkeyup="allLetter();" value="<?php echo $row['First_Name'];?>"><span id="message5"></td>
            <td>Middle Name<span style="color:red">*</span><br><input type="text"  id="name1"name="txtmn" size="30" required onkeyup="allLetter1();" value="<?php echo $row['Middle_Name'];?>"><span id="message3"></td>
            <td>Last Name<span style="color:red">*</span><br><input type="text" id="name2" name="txtln" size="30" required onkeyup="allLetter2();" value="<?php echo $row['Last_Name'];?>"><span id="message4"></td>
        </tr>
        <tr>
            <td>Gender<span style="color:red" >*</span></td>
            <td colspan="2"><input type="text"  id="Gender" name="gender" size="30" value="<?php echo $row['Gender'];?>"></td>
        </tr>
        <tr>
            <td>Date Of Joining<span style="color:red">*</span></td>
            <td><input type="date" name="dated" value="<?php echo $row['R_Date'];?>">
			
			<td>Mobile Number<span style="color:red">*</span><br><input type="number" id= "mobile" name="txtmno" size="30" required onkeyup="check1();" value="<?php echo $row['Mobile_No'];?>" ><span id="message1"></td>
        </tr>
        <tr>
           <td >Address<span style="color:red">*</span><br><input type="text" name="txtaddress" size="30" style="height: 60px;" value="<?php echo $row['Address'];?>"></td>
            <td>E-mail<span style="color:red">*</span><br><input type="text" name="txtemailid" size="30" id="email" required onkeyup="check();" value="<?php echo $row['Email'];?>"><span id="message"></span></td>
			<td >Addhar Card Number<span style="color:red">*</span><br><input type="text" id= "aadhar" name="txtadharno" size="30" required onkeyup="check2();" value="<?php echo $row['Addhar_No'];?>"> <span id="message6"></td>
		</tr>
		<tr>
			
		<td>Username<span style="color:red">*</span><br><input type="text" name="txtun" size="30" value="<?php echo $row['Username'];?>"></td>
            <td>Password<span style="color:red">*</span><br><input type="text" name="txtpass" size="30" value="<?php echo $row['Password'];?>"></td>
		</tr>
        <tr>
            <td colspan="3" align="center">
                <button name="Update" value="Submit" id="btn1"  style="width:120px; height: 40px;">Update</button>&nbsp;&nbsp;&nbsp;
				<button name="Delete" value="Submit" id="btn1"  style="width:120px; height: 40px;">Delete</button>&nbsp;&nbsp;&nbsp;
				</td>
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
if (isset($_POST['Update']))
{
$empid = $_POST['txtempid']; 
$fn =$_POST['txtfn']; 
$mn = $_POST['txtmn'];
$ln = $_POST['txtln'];
$Gen = $_POST['gender'];
$dated = $_POST['dated'];
$mno = $_POST['txtmno'];
$address = $_POST['txtaddress'];
$emailid = $_POST['txtemailid'];
$adharno = $_POST['txtadharno'];
$un = $_POST['txtun'];
$pass = $_POST['txtpass'];


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

$sql=("Update registration_form set First_Name='$fn', Middle_Name='$mn', Last_Name='$ln',Gender='$Gen', R_Date='$dated', Mobile_No='$mno', Address='$address', Email='$emailid', Addhar_No='$adharno', Username='$un', Password='$pass' where Employee_Id='$empid'");	
	if (mysqli_query($conn, $sql)) {
		echo	"Updated Successful";
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>
<?php
if (isset($_POST['Delete']))
{
$empid = $_POST['txtempid']; 
$fn =$_POST['txtfn']; 
$mn = $_POST['txtmn'];
$ln = $_POST['txtln'];
$Gen = $_POST['gender'];
$dated = $_POST['dated'];
$mno = $_POST['txtmno'];
$address = $_POST['txtaddress'];
$emailid = $_POST['txtemailid'];
$adharno = $_POST['txtadharno'];
$un = $_POST['txtun'];
$pass = $_POST['txtpass'];


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

$sql=("Delete from registration_form where Employee_Id='$empid'");	
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