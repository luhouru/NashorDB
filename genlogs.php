<?php

function recentgen($tablename) {
// Connecting to database

$tbody = '';
$connection = mysql_connect("localhost", "chrisluk", "continuum");
$db_name = 'reporting';
mysql_select_db($db_name, $connection);

$current_time = time();
$last24hours = $current_time - 86400;

if ($tablename == "data") {
	$query = "SELECT time, email, major, minor, message, file, extra, data, line FROM data;";
	$result = mysql_query($query);
}
if ($tablename == "errors") {
	$query = "SELECT time, email, major, minor, message, file, extra, data, line FROM errors;";
	$result = mysql_query($query);
}
if ($tablename == "lost") {
	$query = "SELECT time, email, major, minor, message, file, extra, data, line FROM lost;";
	$result = mysql_query($query);
}
if ($tablename == "php") {
	$query = "SELECT time, email, major, minor, message, file, extra, data, line FROM php;";
	$result = mysql_query($query);
}

if ($result === false) {
	return (false);
}

// Display table
while ($table = mysql_fetch_row($result)) {
	mysql_data_seek($result, 0);
	if (mysql_num_rows($result)) {
		$inc = 0;
		mysql_data_seek($result, 0);
		while($row = mysql_fetch_row($result)) {
			//if ($inc >= $startpt && $inc <= $endpt) {
				$tbody .= "<tr>\n";
				$count = 1;
				foreach($row as $key=>$value) {
				    if ($count == 10) {
						$count = 1;
					}
					if ($count == 1) {
						$value = date("m/d/Y | h:i:s A", intval($value));
					}
					if ($count == 6) {
						$value = basename($value);
					}
					if ($count == 2 or $count == 3 or $count == 4 or $count == 5 or $count == 9) {
						$tbody .= '<td align="center">'.htmlentities(trim(preg_replace("/\s+/", " ", $value)))."</td>\n";
					} else {
						$tbody .= '<td>'.htmlentities(trim(preg_replace("/\s+/", " ", $value)))."</td>\n";
					}
					$count += 1;
				}
				$tbody .= "</tr>\n";
			//}
			//$inc += 1;
			//$count++;
		}
	}
}

$result = '<div style"margin-top:3px;" class="panel panel-default">

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="dataTables-'.$tablename.'">
											<col width="170">
											<col width="70">
											<col width="70">
											<col width="70">
											<col width="90">
											<col width="85">
											<col width="50">
											<col width="120">
											<col width="70">
                                            <thead>
                                                <tr>
													<th>Time</th>
                                                    <th>Email</th>
                                                    <th>Major</th>
                                                    <th>Minor</th>
													<th>Message</th>
													<th>File</th>
													<th>Details</th>
													<th>Data</th>
													<th>Line</th>
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