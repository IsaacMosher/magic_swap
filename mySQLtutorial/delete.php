<?php

$username="root";
$password="";
$database="contactlist";
mysql_connect("localhost",$username,$password);

$del_id=$_POST['del_id'];
$del_first=$_POST['del_first'];
$del_last=$_POST['del_last'];
$del_phone=$_POST['del_phone'];
$del_mobile=$_POST['del_mobile'];
$del_fax=$_POST['del_fax'];
$del_email=$_POST['del_email'];
$del_web=$_POST['del_web'];


$query="DELETE FROM contacts WHERE id='$id'";
mysql_query($query);
echo "Record Updated! ";
mysql_close();
?>
<p><a href="insert2.php">Click here</a> for the updated contact list.</p>