<?php

function tablegen($type, $pagenum) {
// Connecting to database

//styling stuff
$and = "&type=".$type;
$prev = $pagenum - 1;
if ($prev < 0) {
$prev = 0;
}
$next = $pagenum + 1;

if ($pagenum == 0) {
$backstyle = "btn-default";
} else {
$backstyle = "btn-primary";
}

$tbody = '';
$connection = mysql_connect("localhost", "syno", "fiend");
$db_name = 'stats';
mysql_select_db($db_name, $connection);
$query = "";
switch ($_COOKIE['username']) {
    case "chris.luk":
        $query = "SELECT * FROM stats_luk ORDER BY entry_id desc;";
	break;
    case "googz":
	$query = "SELECT * FROM stats_googz ORDER BY entry_id desc;";
	break;
    case "chombol":
	$query = "SELECT * FROM stats_chombol ORDER BY entry_id desc;";
	break;
    default:
	$query = "SELECT * FROM stats_luk ORDER BY entry_id desc;";
	break;
}
$result = mysql_query($query);
    
$count = 0;
$startpt = $pagenum * 15;
$endpt = $startpt + 14;

if ($result === false) {
	return (false);
}

// Display table
while ($table = mysql_fetch_row($result)) {
	mysql_data_seek($result, 0);
	if (mysql_num_rows($result)) {
		$inc = 0;
		mysql_data_seek($result, 0);
		while($row = mysql_fetch_assoc($result)) {
			//if ($inc >= $startpt && $inc <= $endpt) {
                $sign = $row['gain'];
	            if ($sign < 0) {
                    $tbody .= "<tr class='danger'>\n";
                } elseif ($sign == 0) {
                    $tbody .= "<tr class='info'>\n";
                } else {
                    $tbody .= "<tr class='success'>\n";
                }
				foreach(array_slice($row,1) as $key=>$value) {    
                    $tbody .= '<td>'.htmlentities(trim(preg_replace("/\s+/", " ", $value)))."</td>\n";
				}
            	$tbody .= "</tr>\n";
			//}
			$inc += 1;
			$count++;
		}
	}
}

$totalpages = ceil($count/15)-1;

if ($pagenum == $totalpages) {
$forstyle = "btn-default";
$next--;
} else {
$forstyle = "btn-primary";
}

$result = '<div style="padding-bottom:3px;" class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-table fa-fw"></i> Post-Game Statistics
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="width: 60px;">Division</th>
                                                    <th style="width: 25px;">LP</th>
                                                    <th style="width: 25px;">Gain</th>
                                                    <th style="width: 60px;">Champion</th>
                                                    <th style="width: 60px;">Position</th>
                                                    <th style="width: 40px;">KDA</th>
                                                    <th style="width: 20px;">CS</th>
                                                    <th style="width: 75px;">Mistakes</th>
                                                    <th style="width: 75px;">Improvements</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            '.$tbody.'
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-12 (nested) -->
                                <div class="col-lg-12">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <!-- /.col-lg-12 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
					';

return $result;
}

?>
