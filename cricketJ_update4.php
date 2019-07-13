<?php

// include the connection streamm
include 'connect.php';

// read the form field
$action = $_REQUEST["action"];
//id	playerName	dob	email	TEAM_id	id	Name
// if this is an add, set all the fields to null
if ($action == 'a') {
	$id = NULL;
	$playerName = null;
	$dob = null;
	$email = null;
 } else {
// read the variable to retrieve the id
	$id = $_REQUEST["id"]; echo $id;
// for an update, read the record and set all fields to the correct valuae
	 	$query = "select * from cricket where id = $id";
		$result = mysqli_query($conn, $query)
			or die(mysqli_connect_error());
		$row = mysqli_fetch_assoc($result);
		$playerName = $row['playerName'];
		$dob = $row['dob'];
		$email = $row['email'];
		$TEAM_id = $row['TEAM_id'];echo $TEAM_id;

} // end if

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Create and Update</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script language="JavaScript" type="text/JavaScript">
<!--

function VerifyForm(form) {

 	if (form.playerName.value == "") {
 	    alert('Please enter player name');
 	    form.cusFirst.focus();
		return false;
 	}
 	if (form.email.value == "") {
 	    alert('Please enter a valid email');
 	    form.cusLast.focus();
		return false;
 	}
 	if (form.dob.value == "") {
 	    alert('Please enter date of birth in the form YYYY-MM-DD with dashes');
 	    form.cusStreet.focus();
		return false;
 	}
 	if (form.TEAM_id.value == "") {
 	    alert('Team is required');
 	    form.TEAM_id.focus();
		return false;
 	}
}

function VerifyForm(form_team) {

    if (form.name.value == "") {
        alert('Please enter team name');
        form.name.focus();
        return false;
    }
}


function CountWords (this_field, show_word_count, show_char_count) {
if (show_word_count == null) {
show_word_count = true;
}
if (show_char_count == null) {
show_char_count = false;
}
var char_count = this_field.value.length;
var fullStr = this_field.value + " ";
var initial_whitespace_rExp = /^[^A-Za-z0-9]+/gi;
var left_trimmedStr = fullStr.replace(initial_whitespace_rExp, "");
var non_alphanumerics_rExp = rExp = /[^A-Za-z0-9]+/gi;
var cleanedStr = left_trimmedStr.replace(non_alphanumerics_rExp, " ");
var splitString = cleanedStr.split(" ");
var word_count = splitString.length -1;
if (fullStr.length <2) {
word_count = 0;
}

return word_count;
}
//-->
</script>
</head>

<body>
<h1>Please Enter Cricket Player Information</h1>
<form action="cricketJ_action4.php" method="get" name="form" onSubmit="return VerifyForm(this)">
  <table width="59%" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="24%"><font size="4">Player Name</font></td>
      <td width="76%"><input name="playerName" type="text" id="playerName" value="<?php echo $playerName;?>" size="20" maxlength="20"></td>
    </tr>
    <tr>
      <td><font size="4">Date of Birth</font></td>
      <td><input name="dob" type="text" id="dob" value="<?php echo $dob;?>" size="25" maxlength="25" placeholder="YYYY-MM-DD"></td>
    </tr>
    <tr>
      <td><font size="4">Email</font></td>
      <td><input name="email" type="text" id="email" value="<?php echo $email;?>" size="40" maxlength="40"></td>
    </tr>
    <tr>
      <td><font size="4">Select Team</font></td>
      <td><label>
        <select name="TEAM_id" id="select">


<?php

$query = "SELECT * FROM team order by name";
	$result = mysqli_query($conn, $query) or die(mysqli_error());
	while ($row = mysqli_fetch_array($result)) {
		$teamid = $row['id'];
		$Name = $row['name'];
		if ($teamid == $TEAM_id) {
			$selected = " Selected ";
		} else {
			$selected = NULL;
		}
		$option = '<option value="' . $teamid . '"' .  $selected . '>' . $Name . '</option>';
		echo $option . "\n";
	} // end while
	//echo $id;
?>
        </select>
      </label></td>
    </tr>

    <tr>
      <td><input name="action" type="hidden" id="action" value="<?php echo $action;?>" />
        <input name="id" type="hidden" id="id" value="<?php echo $id;?>" /></td>
      <td><input type="submit" name="Submit" value="Submit"></td>
    </tr>
  </table>
</form>
<br><br><hr></br><br>


<h1>Please Enter Cricket Team Information</h1>
<form action="cricketJ_action4.php" method="get" name="form_team" onSubmit="return VerifyForm(this)">
  <table width="59%" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="24%"><font size="4">Team Name</font></td>
      <td width="76%"><input name="name" type="text" id="name" value="<?php echo $name;?>" size="20" maxlength="20"></td>
    </tr>
    <tr>
      <td><input name="action_team" type="hidden" id="action" value="<?php echo $action;?>" />
        <input name="id_team" type="hidden" id="id" value="<?php echo $id;?>" /></td>
      <td><input type="submit" name="Submit" value="Submit"></td>
    </tr>
  </table>
</form>


<p><a href="index.php">Return </a></p>
</body>
</html>
