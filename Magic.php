<!DOCTYPE html>
<html>
<head>
  <title>magic PHP </title>
<link type="text/css" rel="stylesheet" href="stylesheetphp.css"/>

</head>
<body>
  <p>
<?php

$con=mysqli_connect("localhost", "root", "", "magic");

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "CREATE TABLE Magic Sales 
(
PID INT NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(PID),
User Name CHAR(50),
Price BIGINT,
Age CHAR(50)
)";
if (mysql_connect())
{
  echo "Congratulations! Your card is on the magic swap market!";
}
else
{
  echo "Error creating database: " . mysqli_error($con);
}
$sql="INSERT INTO `Magic Sales` (username, price, cards)
VALUES
('$_POST[username]','$_POST[price]','$_POST[cards]')";


if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "Your card has been added to the sales list!";

mysqli_close($con);
?>
</p>
</body>
</html>