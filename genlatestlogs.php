<?php

function gen_latest_logs() {
// Connecting to database

$tbody = '';
$connection = mysql_connect("localhost", "chrisluk", "continuum");
$db_name = 'reporting';
mysql_select_db($db_name, $connection);

$lastday = time() - 86400;
$query = "SELECT time, major, minor, message, file FROM errors WHERE time>=$lastday UNION ALL SELECT time, major, minor, message, file FROM data WHERE time>=$lastday UNION ALL SELECT time, major, minor, message, file FROM php WHERE time>=$lastday UNION ALL SELECT time, major, minor, message, file FROM lost WHERE time>=$lastday;";
$result = mysql_query($query);

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
					if ($count == 6) {
						$count = 1;
					}
					if ($count == 5) {
						$value = basename($value);
					}
					if ($count == 1) {
						$value = date("m/d/Y | h:i:s A", intval($value));
					}
					$tbody .= '<td>'.htmlentities(trim(preg_replace("/\s+/", " ", $value)))."</td>\n";
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
                                    <div class="table-responsive" >
                                        <table class="table table-hover" id="dataTables-latest">
											<col width="150">
											<col width="70">
											<col width="70">
											<col width="70">
											<col width="90">
                                            <thead>
                                                <tr>
                                                    <th>Date & Time</th>
                                                    <th>Major</th>
                                                    <th>Minor</th>
                                                    <th>Message</th>
                                                    <th>File</th>
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