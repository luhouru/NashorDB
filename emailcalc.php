<?php
if(empty($_POST['list'])) {
	$happy = 0;
} else {
$usr = 0;
$ndp = 0;
$ops = 0;
$fnc = 0;
$spt = 0;

//print_r($_POST['list']);
for ($i=0; $i<count($_POST['list']); $i++) {
switch($_POST['list'][$i]){
case "A":
$usr = 1;
break;
case "B":
$ndp = 1;
break;
case "C":
$ops = 1;
break;
case "D":
$fnc = 1;
break;
case "E":
$spt = 1;
break;
default:
break;
}
}
$db = mysqli_connect("localhost", "calculator", "calculating", "emails");
if (!$db) {
echo "BAD CONNECT";
}
$result = mysqli_query($db,"SELECT * FROM levels WHERE send_email_to_user = $usr AND send_email_to_ndp = $ndp AND send_email_to_ops = $ops AND send_email_to_fnc = $fnc AND send_email_to_support = $spt");
if (!$result) {
echo "BAD QUERY";
}
$real = mysqli_fetch_assoc($result);
$happy = $real['Email_Level'];
mysqli_close($db);
}

function return_el() {
	global $happy;
	return $happy;
}
?>