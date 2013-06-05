<!DOCTYPE html>
<html>
	<h2><center>Contact List</cetner></h2>
	<table border="0" cellspacing="2" cellpadding="2">
		<tr>
		<th><font face="Arial, Helvetica, sans-serif">Name</font></th>
		<th><font face="Arial, Helvetica, sans-serif">Phone</font></th>
		<th><font face="Arial, Helvetica, sans-serif">Mobile</font></th>
		<th><font face="Arial, Helvetica, sans-serif">Fax &nbsp;</font></th>
		<th><font face="Arial, Helvetica, sans-serif">E-mail &nbsp; &nbsp;</font></th>
		<th><font face="Arial, Helvetica, sans-serif">Website &nbsp; &nbsp;</font></th>
		<th><font face="Arial, Helvetica, sans-serif">Update Info &nbsp;</font></th>
		<th><font face="Arial, Helvetica, sans-serif">Delete Contact</font></th> 
	</tr>

	<?php
		$username="root";
		$password="";
		$database="contactlist";
		mysql_connect("localhost",$username,$password);
		@mysql_select_db($database) or die("Unable to select database");

		//Selects everything fromt the contacts table.
		$query="SELECT * FROM contacts";
		$result=mysql_query($query);
		$num=mysql_numrows($result);
		
		$i=0;
	while ($i < $num) {

		$first=mysql_result($result,$i,"first");
		$last=mysql_result($result,$i,"last");
		$phone=mysql_result($result,$i,"phone");
		$mobile=mysql_result($result,$i,"mobile");
		$fax=mysql_result($result,$i,"fax");
		$email=mysql_result($result,$i,"email");
		$web=mysql_result($result,$i,"web");
		$id1 = mysql_result($result,$i,"id");
	?>

	<tr>
		<td><font face="Arial, Helvetica, sans-serif"><?php echo $first." ".$last; ?></font></td>
		<td><font face="Arial, Helvetica, sans-serif"><?php echo $phone; ?></font></td>
		<td><font face="Arial, Helvetica, sans-serif"><?php echo $mobile; ?></font></td>
		<td><font face="Arial, Helvetica, sans-serif"><?php echo $fax; ?></font></td>
		<td><font face="Arial, Helvetica, sans-serif"><a href="mailto:<?php echo $email; ?>">E-mail</a></font></td>
		<td><font face="Arial, Helvetica, sans-serif"><a href="<?php echo $web; ?>">Website</a></font></td>
		<td><font face="Arial, Helvetica, sans-serif"><a href="insertupdate.php?id=<?php echo $id1 ?>">Update</a></font></td>
		<td><font face="Arial, Helvetica, sans-serif"><a href="delete.php">Delete</a></font></td>
	</tr>

	<?php
		$i++;
	}


echo "</table>"
	?>
	<p></p>
	<a href="contactform.html">Click here</a> to add another contact.



		$username="root";
	$password="";
	$database="allcards";
	mysql_connect("localhost",$username,$password);
	@mysql_select_db($database) or die("Unable to select database");

	$query = mysql_query("SELECT * FROM cards1 WHERE Nname = 'vampire nocturnus'");
		
		WHILE($rows = mysql_fetch_array($query)):

			$Nid = $rows['Nid'];
			$Nname = $rows['Nname'];
			$Nset = $rows['Nset'];
			$Ntype = $rows['Ntype'];

		echo "$Nid $Nname<br>$Nset<br>$Ntype<br><br><br>";

		endwhile;