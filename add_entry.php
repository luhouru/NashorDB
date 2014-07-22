<?php

function add_entry($division, $lp, $champion, $position, $kda, $cs, $mistakes, $improvements) {

	// Connecting to database
	$connection = mysql_connect("localhost", "syno", "fiend");
    $db_name = 'stats';
    mysql_select_db($db_name, $connection);
 	
	/*// INSERT INTO TABLE VALUES FROM FORM
	$division = $_POST['division'];
    $lp = $_POST['lp'];
    $gain = $_POST['gain'];
    $champion = $_POST['champion'];
    $position = $_POST['position'];
    $kda = $_POST['kda'];
    $cs = $_POST['cs'];
	$mistakes = $_POST['mistakes'];
	$improvements = $_POST['improvements'];*/
	
    // find the last entries LP
    switch ($_COOKIE['username']) {
        case "chris.luk":
            $lp_query = "SELECT `lp` FROM stats_luk ORDER BY entry_id DESC limit 1";
            break;
        case "googz":
            $lp_query = "SELECT `lp` FROM stats_googz ORDER BY entry_id DESC limit 1";
            break;
        case "chombol":
            $lp_query = "SELECT `lp` FROM stats_chombol ORDER BY entry_id DESC limit 1";
            break;
        default:
            $lp_query = "SELECT `lp` FROM stats_luk ORDER BY entry_id DESC limit 1";
            break;
    }

    $lp_result = mysql_query($lp_query);
    if ($lp_result == false) {
       die("Error in looking up LP");
    }

    // fetch query results
    $lp_row = mysql_fetch_assoc($lp_result);
    $lp_old = $lp_row['lp'];
    
    $gain = $lp - $lp_old;
    
    // insert the new form inputs into the database
    switch ($_COOKIE['username']) {
	case "chris.luk":
            $insert_query = "INSERT INTO stats_luk SET division='".$division."', lp=$lp, gain='".$gain."', champion='".$champion."', position='".$position."', kda='".$kda."', cs=$cs, mistakes='".$mistakes."', improve_by='".$improvements."';";
            break;
        case "googz":
            $insert_query = "INSERT INTO stats_googz SET division='".$division."', lp=$lp, gain='".$gain."', champion='".$champion."', position='".$position."', kda='".$kda."', cs=$cs, mistakes='".$mistakes."', improve_by='".$improvements."';";
            break;
        case "chombol":
            $insert_query = "INSERT INTO stats_chombol SET division='".$division."', lp=$lp, gain='".$gain."', champion='".$champion."', position='".$position."', kda='".$kda."', cs=$cs, mistakes='".$mistakes."', improve_by='".$improvements."';";
            break;
        default:
            die("Error: Access Denied. Please see administrator.");
    }
    
    if (!mysql_query($insert_query)) {
        die("Error in function: add_entry");
    }

$array = array($division, $lp, $gain, $champion, $position, $kda, $cs, $mistakes, $improvements);
return $array;
}
?>
