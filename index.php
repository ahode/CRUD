<html>
<head>
<title>Display and Delete</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>

<h1>Display</h1>
<p><br><br>

<?php

// include the connection stream
include 'connect.php';

// write a query
$query = "select cricket.id, cricket.playerName, cricket.dob, cricket.email, team.Name
			from cricket
			join team on
			team.id=cricket.TEAM_id
			order by cricket.playerName";
// execute the query using a php function
$result = mysqli_query($conn, $query);
// determine how many rows returned using function
$num = mysqli_num_rows($result);
echo "There are currently $num Cricket players<br><br>";

// start a table
echo "<table cellpadding=\"5\" cellspacing=\"3\" border=\"0\">" ;
// print headings
echo "<tr><td>Player Name</td><td>Date of Birth</td><td>Email</td><td>Team Name</td><td colspan=2 align=center><u>Action</u></td></tr>";

// use while loop and function to retrieve all rows
while ($row = mysqli_fetch_assoc($result)) {
	$id = $row['id'];
	$playerName = $row['playerName'];
	$dob = $row['dob'];
	$email = $row['email'];
	$Name = $row['Name'];

	echo "<tr>";
	echo "<td>$playerName</td>";
	echo "<td>$dob</td>";
	echo "<td>$email</td>";
	echo "<td>$Name</td>";
	echo "<td><a href=\"cricketJ_update4.php?action=u&id=";
	echo $id;
	echo "\">Change</a></td>";
	echo "<td><a href=\"cricketJ_action4.php?action=d&id=";
	echo $id;
	echo "\">Delete</a></td></tr>";

}
// close table
echo "</table>";
echo "<br><br><hr>";



// write a query
$query = "select * from team order by name";
// execute the query using a php function
$result = mysqli_query($conn, $query);
// determine how many rows returned using function
$num = mysqli_num_rows($result);
echo "There are currently $num Team<br><br>";

// start a table
echo "<table cellpadding=\"5\" cellspacing=\"3\" border=\"0\">" ;
// print headings
echo "<tr><td>Team Name</td><td colspan=2 align=center><u>Action</u></td></tr>";

// use while loop and function to retrieve all rows
while ($row = mysqli_fetch_assoc($result)) {
	$id = $row['id'];
	$Name = $row['name'];

	echo "<tr>";
	echo "<td>$Name</td>";
	echo "<td><a href=\"cricketJ_update4.php?action_team=u&id=";
	echo $id;
	echo "\">Change</a></td>";
	echo "<td><a href=\"cricketJ_action4.php?action_team=d&id=";
	echo $id;
	echo "\">Delete</a></td></tr>";

}
// close table
echo "</table>";

?>
<br><br>
<a href="cricketJ_update4.php?action=a">Add</a>
<br><br>
<p><a href="#">Return </a></p>
</body>
</html>
