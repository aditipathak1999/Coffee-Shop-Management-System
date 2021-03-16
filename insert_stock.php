<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <title>Stock Details</title>
	<script language="javascript">
                function multiNumbers()
                {
                        var val2 = parseInt(document.getElementById("value2").value);
                        var ansD = document.getElementById("value3");
                        ansD.value = 5 * val2;
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
	#btn2
    {
    background-color: gray;
    background-image: linear-gradient(315deg, gray 0%, #e0d4ae 74%);
    color:black;
    padding:5px;
    font-size: 18px;
    cursor: pointer;
    margin: 13px;
    }
	#btn3
    {
    background-color: gray;
    background-image: linear-gradient(315deg, gray 0%, #e0d4ae 74%);
    color:black;
    padding:5px;
    font-size: 18px;
    cursor: pointer;
    margin: 13px;
    }
	#btn4
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
<body >
<form action ="insert_stock.php" method="post">
        <div id="ab">
        <table id="tableaddress" align="center" width="50%" cellspacing="2" cellpadding="20" border="5">
        <tr>
            <td colspan="3" align="center" style="font-family: cooper; background-color:rgb(0,0,0.6);"><font size="6"><b><span style="color:#FFFFFF; ">Stock Details</b></font></td>
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
		  <td colspan="2">No.of liter/pouch<span style="color:red">*</span><input type="number" id="value2" name="txtnooflitre" style="width: 70%"/>
		  <input type="button" name="Sumbit" value="+" onclick="javascript:multiNumbers()"/></td></td>
		  </tr>
		  <tr>
		  <td colspan="2">No.of cups<span style="color:red">*</span><input type="number" id="value3" name="txtnoofcups" style="width: 70%"/>
		    
		  </tr>
		  <tr>
		  <td colspan="2">Cost per cup<span style="color:red">*</span><input type="number" id="value1" name="txtrateperunit"/></td>
		  </tr>
		   <tr>
            <td colspan="4" align="center">
                <button value="Submit" id="btn1" name="insert" style="width:120px; height: 40px;">Add</button>&nbsp;&nbsp;&nbsp;
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
$Product = filter_input(INPUT_POST, 'Product');
$txtnooflitre = filter_input(INPUT_POST, 'txtnooflitre');
$txtnoofcups = filter_input(INPUT_POST, 'txtnoofcups');
$txtrateperunit = filter_input(INPUT_POST, 'txtrateperunit');


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

$sql=("Update stock_details SET  No_Of_litre='$txtnooflitre', No_Of_Cups='$txtnoofcups',Cost_Per_Cups='$txtrateperunit' WHERE Product_Name='$Product'");


	if (mysqli_query($conn, $sql)) {
		echo	"Inserted Successful";
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



mysqli_close($conn);
}
?>