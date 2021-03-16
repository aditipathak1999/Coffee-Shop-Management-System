
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <title>Registration Form</title>
<script language="javascript">
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

function check2()
{

    var aadhar = document.getElementById('aadhar');
   
    
    var message = document.getElementById('message6');

   var goodColor = "#0C6";
    var badColor = "#FF9B37";
  
    if(aadhar.value.length!=12){
       
        aadhar.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "required 12 digits, match requested format!"
    }
else
{mobile.style.backgroundColor = goodColor;
        message.style.color = goodColor;
message.innerHTML="correct format!"}}

function check()
{

    var email = document.getElementById('email');
   
    
    var message = document.getElementById('message');

   var goodColor = "#0C6";
    var badColor = "#FF9B37";
  letters= /^[A-Z0-9_'%=+!`#~$*?^{}&|-]+([\.][A-Z0-9_'%=+!`#~$*?^{}&|-]+)*@[A-Z0-9-]+(\.[A-Z0-9-]+)+$/i;
    if(email.value.match(letters)){
       
        email.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "correct format";
    }
else
{email.style.backgroundColor = badColor;
        message.style.color = badColor;
message.innerHTML="incorrect format!";}}

function allLetter()
      { var name = document.getElementById('name');
var message = document.getElementById('message5');

      var letters = /^[A-Za-z]+$/;
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
	  
function allLetter1()
      { var name = document.getElementById('name1');
var message = document.getElementById('message3');

      var letters = /^[A-Za-z]+$/;
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

function allLetter2()
      { var name = document.getElementById('name2');
var message = document.getElementById('message4');

      var letters = /^[A-Za-z]+$/;
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
	body{
	background-image:url(iconcoffee1.jpg);
	background-position:center;
	background-size:cover;
	background-repeat:no-repeat;
	margin:0;
	padding:0;
	}
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
    transform: translate(5%,-2%);
    }
    
    </style>
    
</head>
<body>
<form method="post">
        <div id="ab">
        <table id="tableaddress" align="center" width="50%" cellspacing="2" cellpadding="20" border="5">
        <tr>
            <td colspan="3" align="center" style="font-family: cooper; background-color:rgb(0,0,0.6);"><font size="6"><b><span style="color:#FFFFFF; ">Registration Form</b></font></td>
        </tr>
        <tr>
            <td>Employee Id<span style="color:red">*</span></td>
            <td colspan="2"><input type="text" name="txtempid"size="10">
				<input type="button" name="Search" value="Search" id="btn1" onclick="location.href = 'r_search.php';"/></td>
        </tr>
        <tr>
            <td>First Name<span style="color:red">*</span><br><input type="text" id="name" name="txtfn" size="30" required onkeyup="allLetter();"><span id="message5"></td>
            <td>Middle Name<span style="color:red">*</span><br><input type="text"  id="name1"name="txtmn" size="30" required onkeyup="allLetter1();"><span id="message3"></td>
            <td>Last Name<span style="color:red">*</span><br><input type="text" id="name2" name="txtln" size="30" required onkeyup="allLetter2();"><span id="message4"></td>
        </tr>
        <tr>
            <td>Gender<span style="color:red">*</span></td>
            <td colspan="2"><input type="radio" name="Gender" id="m" value="Male">MALE
			<input type="radio" name="Gender" value="Female" id="f">FEMALE
			<input type="radio" name="Gender" value="Other" id="o">OTHER</td>
        </tr>
        <tr>
            <td>Date Of Joining<span style="color:red">*</span></td>
            <td><input type="date" name="dated"></td>
			<td>Mobile Number<span style="color:red">*</span><br><input type="number" id= "mobile" name="txtmno" size="30" required onkeyup="check1();" ><span id="message1"></td>
        </tr>
        <tr>
           <td >Address<span style="color:red">*</span><br><input type="text" name="txtaddress" size="30" style="height: 60px;"></td>
            <td>E-mail<span style="color:red">*</span><br><input type="text" name="txtemailid" size="30" id="email" required onkeyup="check();" ><span id="message"></span></td>
			<td >Addhar Card Number<span style="color:red">*</span><br><input type="text" id= "aadhar" name="txtadharno" size="30" required onkeyup="check2();" > <span id="message6"></td>
		</tr>
		<tr>
			
		<td>Username<span style="color:red">*</span><br><input type="text" name="txtun" size="30"></td>
            <td>Password<span style="color:red">*</span><br><input type="text" name="txtpass" size="30"></td>
		</tr>
        <tr>
            <td colspan="3" align="center">
                <button value="Submit" id="btn1"  name = "insert" style="width:120px; height: 40px;">Add</button>&nbsp;&nbsp;&nbsp;
				<button name="home" value="home"  id="btn1"  style="width:100px; height: 40px;"><a href="MDI.html">Home</a></button>
				</td>
        </tr>
    </table>

</form>


<?php
if (isset($_POST['insert']))
{
$txtempid = filter_input(INPUT_POST, 'txtempid');
$txtfn = filter_input(INPUT_POST, 'txtfn');
$txtmn = filter_input(INPUT_POST, 'txtmn');
$txtln = filter_input(INPUT_POST, 'txtln');
$Gender = filter_input(INPUT_POST, 'Gender');
$dated1 = date('y-m-d', strtotime($_POST['dated']));
$txtmno = filter_input(INPUT_POST, 'txtmno');
$txtaddress = filter_input(INPUT_POST, 'txtaddress');
$txtemailid = filter_input(INPUT_POST, 'txtemailid');
$txtadharno = filter_input(INPUT_POST, 'txtadharno');
$txtun = filter_input(INPUT_POST, 'txtun');
$txtpass = filter_input(INPUT_POST, 'txtpass');



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



$sql = "INSERT INTO registration_form (Employee_Id, First_Name, Middle_Name, Last_Name, Gender,R_Date, Mobile_No, Address, Email, Addhar_No, Username, Password)
values ('$txtempid','$txtfn','$txtmn','$txtln','$Gender','$dated1','$txtmno','$txtaddress','$txtemailid','$txtadharno','$txtun','$txtpass')";

	if (mysqli_query($conn, $sql)) {
		echo	"Inserted Successful";
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



mysqli_close($conn);
}
?>
        </div>
    </div>
        </div>
</div>
</div>



</body>
</html>


