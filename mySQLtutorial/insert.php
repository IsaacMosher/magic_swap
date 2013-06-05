<?php
$username="root";
$password="";
$database="contactlist";
mysql_connect("localhost",$username,$password);
@mysql_select_db($database) or die("Unable to select database");

//Selects everything fromt he contacts table.
$query="SELECT * FROM contacts";
$result=mysql_query($query);



$num=mysql_numrows($result);

echo "<b><center>Database Output</center></b><br><br>";

//This while loop ensures that each contact gets added just once.
$i=0;
while ($i < $num) {

$first=mysql_result($result,$i,"first");
$last=mysql_result($result,$i,"last");
$phone=mysql_result($result,$i,"phone");
$mobile=mysql_result($result,$i,"mobile");
$fax=mysql_result($result,$i,"fax");
$email=mysql_result($result,$i,"email");
$web=mysql_result($result,$i,"web");

echo "<b>$first $last</b><br>Phone: $phone<br>Mobile: $mobile<br>Fax: $fax<br>E-mail: $email<br>Web: $web<br><hr><br>";

$i++;
}

?>



<!--I now submit the data on separtate page and so this will not be needed. Otherwise
	it goes right after I select and get into the database.
if(isset($_POST['first'])){
	$first=$_POST['first'];
	$last=$_POST['last'];
	$phone=$_POST['phone'];
	$mobile=$_POST['mobile'];
	$fax=$_POST['fax'];
	$email=$_POST['email'];
	$web=$_POST['web'];
	$query = "INSERT INTO contacts VALUES ('','$first','$last','$phone','$mobile','$fax','$email','$web')";
	mysql_query($query);
	echo("Contact added!");
}; -->