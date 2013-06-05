<?php

$ud_id=$_POST['ud_id'];
$ud_first=$_POST['ud_first'];
$ud_last=$_POST['ud_last'];
$ud_phone=$_POST['ud_phone'];
$ud_mobile=$_POST['ud_mobile'];
$ud_fax=$_POST['ud_fax'];
$ud_email=$_POST['ud_email'];
$ud_web=$_POST['ud_web'];

$username="root";
$password="";
$database="contactlist";
mysql_connect("localhost",$username,$password) or die('BACON!');


$query="INSERT INTO contacts VALUES ('','$ud_first','$ud_last','$ud_phone','$ud_mobile','$ud_fax','$ud_email','$ud_web')";
mysql_query($query);
?>
<p>Record Updated!</p>
<p><a href=/mySQLtutorial/insert2.php>Click here</a> for the updated contact list.</p>