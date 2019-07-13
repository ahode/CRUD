<html>
<head>
<title>Cricket Cricket</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<h1>Cricket Player Update center</h1>
<p>&nbsp;</p>
<?php

// include the connection streamm
include 'connect.php';
$action = $_REQUEST["action"];
$id = $_REQUEST["id"];
$action_team = $_REQUEST["action_team"];
$id_team = $_REQUEST["id_team"];

if (isset($_REQUEST['playerName']) and isset($_REQUEST['dob']) and isset($_REQUEST['email']) and isset($_REQUEST['TEAM_id'])) {
	# code...
	$playerName = $_REQUEST['playerName'];
	$dob = $_REQUEST['dob'];
	$email = $_REQUEST['email'];
	$TEAM_id = $_REQUEST['TEAM_id'];
}

//$dt = date('Y-m-d');

// here I test the parm
// the action I take depends on if the parm is a(dd) or u(pdate)
if ($action == 'a') {
	$query = "insert into cricket values (
		null,
		'$playerName',
		'$dob',
		'$email',
		'$TEAM_id'
	)";

	mysqli_query($conn, $query) or
	die(mysqli_error());
	echo "<h3>The cricket Player has ID " . mysqli_insert_id($conn) . " . </h3>";
}

if (isset($_REQUEST['name'])) {
	$name = $_REQUEST['name'];
}



if ($action_team == 'a') {
	$query = "insert into team values (
		null,
		'$name'
	)";

	mysqli_query($conn, $query) or
	die(mysqli_error());
	echo "<h3>The cricket Team has ID " . mysqli_insert_id($conn) . " . </h3>";
}


// now check for an update
// I will use a set query to update the changed fields
// I also update the changed date field

// now check for an update
// I will use a set query to update the changed fields
// I also update the changed date field
if ($action == 'u') {
	$query = "update cricket
		set playerName = '$playerName',
		dob = '$dob',
		email = '$email',
		TEAM_id = '$TEAM_id'
		where cricket.id = '$id'";
	$result=mysqli_query($conn, $query) or
		die(mysqli_error());
	print "<h3>Update Successful</h3>";
} // end u

if ($action_team == 'u') {
	$query = "update team
		set name = '$name'
		where team.id = '$id'";
	$result=mysqli_query($conn, $query) or
		die(mysqli_error());
	print "<h3>Update Successful</h3>";
} // end u

if ($action == 'd') {
// this is a delete
// so perform a delete query
		$query = "delete from cricket
		where cricket.id = '$id'";
		$result = mysqli_query($conn, $query)
			 or die("query failed:" . mysqli_connect_error());
	print "<h4>Delete Successful</h4>";
}

if ($action_team == 'd') {
// this is a delete
// so perform a delete query
		$query = "delete from team
		where team.id = '$id'";
		$result = mysqli_query($conn, $query)
			 or die("query failed:" . mysqli_connect_error());
	print "<h4>Delete Successful</h4>";
}
?>
<br>
<p><a href="index.php">Return</a></p>
<p>&nbsp; </p>
</body>
</html>
