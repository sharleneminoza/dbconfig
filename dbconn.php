<?php 
include("../Assets/CSS/dbconn.css")
 ?>


<form method="POST">
<table width="100%" align="center">
<tr>
	<th><legend>INSERT DATA</legend></th>
	<center>
</tr>
<tr id="inputdata">
	<td><input type="hidden" name="validate" value="true" class="input"></td>
</tr>
<tr id="inputdata">
	<td><input type="hidden" name="UserID" class="input"></td>
</tr>
<tr id="inputdata">
	<td><input type="text" name="UserName" placeholder="Enter Username" class="input"></td>
</tr>
<tr id="inputdata">
	<td><input type="password" name="Password" placeholder="Enter Password" class="input"></td>
</tr>
<tr id="inputdata">
	<td><input type="password" name="cPassword" placeholder="Confirm Password" class="input"></td>
</tr>
<tr id="inputdata">
	<td><input type="text" name="Email" placeholder="Email Address" class="input"></td>
</tr>
<tr id="inputdata">
	<td><button name="submit" value="Insert Data">Insert Data</button></td>
</tr>
</table>
</center>
<?php

$dbconn = new mysqli("localhost", "root", "", "studentinfo");
if (isset($_POST['validate'])) 
{
	if (empty($_POST['UserName'])) {
		echo "<center>Username is required</center><br>";
	}
	if (empty($_POST['Password'])) {
		echo "<center>Password is require</center><br>";
	}
	if (empty($_POST['Email'])) {
		echo "<center>Password is required</center><br>";
	}
	elseif ($_POST['Password']!=$_POST['cPassword']){
echo "<center>Password does not match</center<br>";
	}
	else{

	$sql = "INSERT INTO User (UserID, UserName, Password, Email)
	VALUES ('$_POST[UserID]', '$_POST[UserName]',  '$_POST[Password]', '$_POST[Email]')";

		if ($dbconn->query($sql)===TRUE) {
			echo "<center> New record created successfully <center><br>";
	}
	else
		echo "Error".$sql. "<br>". $rinalie->error;
	}
}
?>

<table border="2" align="center">
        <tr>
        	<th>UserID</th><th>UserName</th><th>Password</th><th>Email</th><th>Delete</th><th>Edit</th>
        </tr>
<?php
$sql = "SELECT * FROM User";
$result = $dbconn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    	{?>
        
        	<tr>
        		<td><?php echo $row["UserID"]?></td>
        		<td><?php echo $row["UserName"] ?></td>
        		<td><?php echo $row["Password"] ?></td>
        		<td><?php echo $row["Email"] ?></td>
        		<td><input type="button" name="delete" value="Delete"></td>
        		<td><input type="button" name="edit" value="Edit"></form></td>
        	</tr>


        <?php
    }
} else {
    echo "0 results";
}
$dbconn->close();
?>
</table>
<?php

if($_POST){
    if(isset($_POST['delete'])){
        delete();
    }//elseif(isset($_GET['select'])){
        //select();
    //}
}

    function delete()
    {
    	$delete1 ="DELETE FROM  `user`  WHERE UserID= '5' ";
        $result = mysqli_query($dbconn,$delete1) or die(mysqli_error());
        
	echo "record deleted";
   
   
 
    }
?>

</body>
</html>