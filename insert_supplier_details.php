<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <title>Supplier</title>
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
    transform: translate(5%,1%);
    }
    </style>
</head>
	<body >
	<form action ="insert_supplier_details.php" method="post">
        <div id="ab">
        <table id="tableaddress" align="center" width="50%" cellspacing="2" cellpadding="20" border="5">
        <tr>
            <td colspan="3" align="center" style="font-family: cooper; background-color:rgb(0,0,0.6);"><font size="6"><b><span style="color:#FFFFFF; ">Supplier Details</b></font>
		</tr>
		<tr>
            <td> Name<span style="color:red">*</span>
			<td colspan="2"><input type="text" id="name" name="txtfn" size="30" required onkeyup="allLetter();"><span id="message"></span>
			<input type="button" name="Search" value="Search" id="btn1" onclick="location.href = 'supplier_search.php';"/></td>
      
        </tr>
		<tr>
			<td>Mobile Number<span style="color:red">*</span></td>
			<td colspan="2"><input type="number" id= "mobile" name="txtsno" size="30" required onkeyup="check();" ><span id="message1"></span></td>
		</tr>
		<tr>
           <td >Address<span style="color:red">*</span></td>
		   <td colspan="2"><input type="text" name="txtaddress" size="30" style="height: 30px;"></td>
		</tr>
		<tr>
           <td >Product Name<span style="color:red">*</span></td>
		   <td colspan="2"> <select name="Product" style="width: 30%;">
					<option value=""></option>
                    <option value="Milk">Milk</option>
                    <option value="Coffee">Coffee Powder</option>
					<option value="Tea">Tea Powder</option>
                </select></td>
		  </tr>
		  <tr>
            <td>Purchaising Date<span style="color:red">*</span></td>
            <td colspan="2"><input type="date" name="dated"></td>
		</tr>
		<tr>
           <td >Rate Per Unit<span style="color:red">*</span></td>
		   <td><input type="number" id="value1" name="txtrateperunit"/></td>
		   <td>Total Purchasing<span style="color:red">*</span><input type="number" id="value2" name="txttotalpurhase"/>
		    <input type="button" name="Sumbit" value="+" onclick="javascript:multiNumbers()"/>
		  </tr>
		  
		 <tr>
           <td >Total<span style="color:red">*</span></td>
		   <td colspan="2"><input type="number" id="total" name="txttotal" value=""/></td>
		  </tr>
		  <tr>
            <td colspan="3" align="center">
                <button value="Submit" id="btn1" name="insert"  style="width:120px; height: 40px;">Add</button>&nbsp;&nbsp;&nbsp;
				<button name="home" value="home"  id="btn1"  style="width:100px; height: 40px;"><a href="MDI.html">Home</a></button>
        </tr>
    </table>
	</form>
        </div>
    </div>
        </div>
</div>
</div>



</body>
</html>
		
		
<?php
if (isset($_POST['insert']))
{
$txtfn = filter_input(INPUT_POST, 'txtfn');
$txtsno = filter_input(INPUT_POST, 'txtsno');
$txtaddress = filter_input(INPUT_POST, 'txtaddress');
$Product = filter_input(INPUT_POST, 'Product');
$dated1 = date('y-m-d', strtotime($_POST['dated']));
$txtrateperunit = filter_input(INPUT_POST, 'txtrateperunit');
$txttotalpurhase = filter_input(INPUT_POST, 'txttotalpurhase');
$txttotal = filter_input(INPUT_POST, 'txttotal');


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



$sql = "INSERT INTO supplier_details (S_Name, Mobile_No, Address, Product_Name,Purchasing_date, Rate_Per_Unit, Total_Purchasing, Total)
values ('$txtfn','$txtsno','$txtaddress','$Product','$dated1','$txtrateperunit','$txttotalpurhase','$txttotal')";

	if (mysqli_query($conn, $sql)) {
		echo	"Inserted Successful";
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



mysqli_close($conn);
}
?>


