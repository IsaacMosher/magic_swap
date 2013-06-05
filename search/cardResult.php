<!DOCTYPE html>
<html>

<head>
	<title>Card Name</title>
	<link href="css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.autocomplete.pack.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>

<body>
	<center><h1>~Results~</h1></center>
	<?php
	if(isset($_GET['cardName1'])){
	$card1=$_GET["cardName1"];
	} else {
		echo ("meow raar it broke");
	}

	$username="root";
	$password="";
	$database="allcards";
	mysql_connect("localhost",$username,$password);
	@mysql_select_db($database) or die("Unable to select database");

	$card1 = mysql_real_escape_string($card1);
	$query = mysql_query("SELECT * FROM cards1 WHERE Nname = '$card1'");
		
		WHILE($rows = mysql_fetch_array($query)):

			$Nid = $rows['Nid'];
			$Nname = $rows['Nname'];
			$Nset = $rows['Nset'];
			$Ntype = $rows['Ntype'];
			$Nrarity = $rows['Nrarity'];
			$Nmanacost = $rows['Nmanacost'];
			$Nconverted_manacost = $rows['Nconverted_manacost'];
			$Npower = $rows['Npower'];
			$Ntoughness = $rows['Ntoughness'];
			$Nloyalty = $rows['Nloyalty'];
			$Nability = $rows['Nability'];
			$Nflavor = $rows['Nflavor'];
			$Nartist = $rows['Nartist'];

			//Set pics are named after set plus rarity letter.
			$Nset = '<IMG SRC="set/'.$Nset.$Nrarity.'.jpg" alt = $Nset>';

			//Getting rid of the brackets and space at the end.
			$Nmanacost = explode("{", $Nmanacost);
			$Nmanacost = implode("", $Nmanacost);
			$Nmanacost = explode("}", $Nmanacost);
			$blank = array_pop($Nmanacost);

			//variables for while loop
			$NmanacostCount = count($Nmanacost) - 1;
			$Nmanacost1 = "";

			//gets the page to display the right amount of mana
			while($NmanacostCount >= 0) {
				$Nmanacost1 = '<IMG SRC="manacost/'.$Nmanacost[$NmanacostCount].'.jpg">' . $Nmanacost1;
				$NmanacostCount--;
			}
	
			//Makes the page display the entire word for the rarity
			switch ($Nrarity) {
				case "C":
					$Nrarity = "Common";
					break;
				case "U":
					$Nrarity = "Uncommon";
					break;
				case "R":
					$Nrarity = "Rare";
					break;
				case "M":
					$Nrarity = "Mythic Rare";
					break;
			}

			$Nability = htmlentities($Nability);
			$Nability = str_replace("#_","<i>",$Nability);
			$Nability = str_replace("_#","</i>",$Nability);
			$Nability = str_replace("&pound;","<br>",$Nability);

			$Nability = preg_replace("{{.}}", '<IMG SRC="abilityimg/'."$0".'.jpg">',$Nability);
			$Nability = preg_replace("{{..}}", '<IMG SRC="abilityimg/'."$0".'.jpg">',$Nability);
			$Nability = str_replace("{","",$Nability);
			$Nability = str_replace("}","",$Nability);

			$Nflavor = htmlentities($Nflavor);
			$Nflavor = str_replace("#_","<i>",$Nflavor);
			$Nflavor = str_replace("_#","<i>",$Nflavor);
			$Nflavor = str_replace("&pound;","<br>",$Nflavor);

		//echo onto page below. if/else statements are for display or not 
		//displaying the card loyalty and flavor text.
		echo "<div id=card_title>$Nname</div><strong>ID:</strong> $Nid<br><strong>Set:</strong> $Nset<br><strong>Type: </strong>$Ntype<br>
		<strong>Rarity:</strong> $Nrarity<br><strong>Manacost:</strong> $Nmanacost1<br>
		<strong>Converted Manacost: </strong>$Nconverted_manacost<br>";
			if(is_null($Nloyalty) && is_null($Npower) && is_null($Ntoughness) && is_null($Nability) && is_null($Nflavor)){
				echo "<strong>Artist: </strong>$Nartist";
			} else if(is_null($Nloyalty) && is_null($Npower) && is_null($Ntoughness) && is_null($Nability)){
				echo "<strong>Flavor Text:</strong> $Nflavor<br><strong>Artist: </strong> $Nartist<br>";
			} else if(is_null($Nloyalty) && is_null($Npower) && is_null($Ntoughness) && is_null($Nflavor)){
				echo "<strong>Ability: </strong> $Nability<br><strong>Artist: </strong>$Nartist<br>";
			} else if(is_null($Nloyalty) && is_null($Npower) && is_null($Ntoughness)){
				echo "<strong>Ability: </strong> $Nability<br><strong>Flavor Text: </strong> $Nflavor<br><strong>Artist: </strong>$Nartist<br>";
			} else if(is_null($Nloyalty) == False){
				echo "<strong>Loyalty: </strong>$Nloyalty<br><strong>Ability: </strong> $Nability<br><strong>Artist: </strong>$Nartist<br>";
			} else if(is_null($Nflavor) && is_null($Nability) && is_null($Ntoughness) == False) {
				echo "<strong>Power: </strong> $Npower<br><strong>Toughness: </strong>$Ntoughness<br><strong>Artist: </strong>$Nartist<br>";
			} else if(is_null($Nflavor) && is_null($Ntoughness) == False){
				echo "<strong>Power: </strong> $Npower<br><strong>Toughness: </strong>$Ntoughness<br><strong>Ability: </strong>$Nability<br><strong>Artist: </strong>$Nartist<br>";
			} else if(is_null($Nability)) {
				echo "<strong>Power: </strong> $Npower<br><strong>Toughness: </strong>$Ntoughness<br><strong>Flavor Text: </strong> $Nflavor<br><strong>Artist: </strong>$Nartist<br>";
			} else if(is_null($Nflavor) == False) {
				echo "<strong>Power: </strong> $Npower<br><strong>Toughness: </strong>$Ntoughness<br><strong>Ability: </strong>$Nability<br><strong>Artist: </strong>$Nartist<br>";
			} else {
				echo "<strong>Power: </strong> $Npower<br><strong>Toughness: </strong>$Ntoughness<br><strong>Ability: </strong>$Nability<br><strong>Flavor Text: </strong> $Nflavor<br><strong>Artist: </strong>$Nartist<br>";
			}
			
			echo "<IMG SRC='http://gatherer.wizards.com/Handlers/Image.ashx?multiverseid=$Nid&type=card'><hr><br>";

		endwhile;

		echo '<a href="index.html">Search a new card</a>';	


/*$Nability = str_replace("{1}", '<IMG SRC="abilityimg/1.jpg">', $Nability);
			$Nability = str_replace("{2}", '<IMG SRC="abilityimg/2.jpg">', $Nability);
			//$Nability = str_replace("{3}", '<IMG SRC="abilityimg/3.jpg">', $Nability);
			$Nability = str_replace("{G}", '<IMG SRC="abilityimg/green.jpg">', $Nability);
			$Nability = str_replace("{U}", '<IMG SRC="abilityimg/blue.jpg">', $Nability);
			$Nability = str_replace("{R}", '<IMG SRC="abilityimg/red.jpg">', $Nability);
			$Nability = str_replace("{B}", '<IMG SRC="abilityimg/black.jpg">', $Nability);
			$Nability = str_replace("{UB}", '<IMG SRC="abilityimg/blueblack.jpg">', $Nability);*/

			//$Nability = '<img src="'.preg_replace("{{.}}", '$0', $Nability).'"/>';
	?>
</body>

</html>