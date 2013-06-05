<?php
$id=$_GET['id'];
$username="root";
$password="";
$database="contactlist";
mysql_connect("localhost",$username,$password);
@mysql_select_db($database) or die("Unable to select database");

$query="SELECT * FROM contacts WHERE id='$id'";
$result=mysql_query($query);
$num=mysql_numrows($result) or die("bacon!");
mysql_close();

$i=0;
while ($i < $num) {
$first=mysql_result($result,$i,"first");
$last=mysql_result($result,$i,"last");
$phone=mysql_result($result,$i,"phone");  
$mobile=mysql_result($result,$i,"mobile");
$fax=mysql_result($result,$i,"fax");
$email=mysql_result($result,$i,"email");
$web=mysql_result($result,$i,"web");
?>

<form action="update.php" method="post">
<input type="hidden" name="ud_id" value="<?php echo $id; ?>">
First Name: <input type="text" name="ud_first" value="<?php echo $first; ?>"><br>
Last Name: <input type="text" name="ud_last" value="<?php echo $last; ?>"><br>
Phone Number: <input type="text" name="ud_phone" value="<?php echo $phone; ?>"><br>
Mobile Number: <input type="text" name="ud_mobile" value="<?php echo $mobile; ?>"><br>
Fax Number: <input type="text" name="ud_fax" value="<?php echo $fax; ?>"><br>
E-mail Address: <input type="text" name="ud_email" value="<?php echo $email; ?>"><br>
Web Address: <input type="text" name="ud_web" value="<?php echo $web; ?>"><br>
<input type="Submit" value="Update">
</form>

<?php
++$i;
}
?>