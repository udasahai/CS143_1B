<?php

include "connect.php"; 

print "

<!DOCTYPE html>
<html>
<head>
	<title>Search</title>

<style>
//table, th, td {border: 1px solid black;}
</style>

</head> 
	<body>
	<fieldset> 
	<legend> What would you like to search  </legend>
	<form>
	<input type='text' size='50' name='search' placeholder='Search'>
	<input type='submit' name='Submit' value='Submit'>
	</form>
	</fieldset> 
	<br> 
	<br>
 " ;


if ( isset($_GET['Submit']))
{

$key = $_GET['search']; 


 $query =  "SELECT first, last FROM Actor where first REGEXP '$key' or last REGEXP '$key';";
 $rs = $db_connection->query($query);

print "<b> The results from Actors are - </b><br>";


print '<table style="width:70%">';


while($row = $rs->fetch_assoc())
{
	print("<tr>");
	
		print("<td>");
		
		$name = $row['first']." ".$row['last'];
		print "$name";

		print("</td>");

	print("</tr>");
		//echo htmlentities($row['_message']);
		//print "$value	";

	//} 
	//print "<br><br>";
}

print "</table>";

}


 $query =  "SELECT title FROM Movie where title REGEXP '$key';";
 $rs = $db_connection->query($query);

print "<br><br><b> The results from Movies are - </b> <br>";


 print '<table style="width:70%">';


while($row = $rs->fetch_assoc())
{
	print("<tr>");
	
		print("<td>");
		
		$name = $row['title'];
		print "$name";

		print("</td>");

	print("</tr>");
	// 	//echo htmlentities($row['_message']);
	// 	//print "$value	";

	// //} 
	// //print "<br><br>";
}

 print "</table>";

// }






print "</body>"; 
print "</html>";

 ?> 