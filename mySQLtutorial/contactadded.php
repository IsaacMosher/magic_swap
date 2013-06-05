<html>
<?php
//Info below connects me to the database.
$username="root";
$password="";
$database="contactlist";
mysql_connect("localhost",$username,$password);
@mysql_select_db($database) or die("Unable to select database");

//Checks if the var's are set. If yes it sets them equal to the contact info entered.
if(isset($_POST['first'])){
	$first=$_POST['first'];
	$last=$_POST['last'];
	$phone=$_POST['phone'];
	$mobile=$_POST['mobile'];
	$fax=$_POST['fax'];
	$email=$_POST['email'];
	$web=$_POST['web'];
	//Inserts above info into the various values in the contactlist table.
	$query = "INSERT INTO contacts VALUES ('','$first','$last','$phone','$mobile','$fax','$email','$web')";
	mysql_query($query);
};
?>
<p>Contact added!</p>
<a href=/mySQLtutorial/insert2.php>Click here</a> for the contact list!
</html>