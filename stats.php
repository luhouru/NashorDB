            <p style="color:black">
                    <?php
                    	$connection = mysql_connect("localhost", "syno", "fiend");
                        $db_name = 'stats';
                        mysql_select_db($db_name, $connection);

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
    
                        // fetch query results
	                $lp_row = mysql_fetch_assoc($lp_result);
                        $lp_old = $lp_row['lp'];
			
			switch ($_COOKIE['username']) {
                            case "chris.luk":
                                $div_query = "SELECT `division` FROM stats_luk ORDER BY entry_id DESC limit 1";
                                break;
                            case "googz":
                                $div_query = "SELECT `division` FROM stats_googz ORDER BY entry_id DESC limit 1";
                                break;
                            case "chombol":
                                $div_query = "SELECT `division` FROM stats_chombol ORDER BY entry_id DESC limit 1";
                                break;
                            default:
                                $div_query = "SELECT `division` FROM stats_luk ORDER BY entry_id DESC limit 1";
                                break;
                        }	

			// fetch division query results
			$div_result = mysql_query($div_query);
			$div_row = mysql_fetch_assoc($div_result);
			$current_div = $div_row['division'];
			$next_div = "";
			switch ($current_div) {
			    case "Bronze V":
			        $next_div = "Bronze IV";
			        break;
			    case "Bronze IV":
				$next_div = "Bronze III";
				break;
			    case "Bronze III":
				$next_div = "Bronze II";
				break;
			    case "Bronze II":
				$next_div = "Bronze I";
				break;
			    case "Bronze I":
				$next_div = "Silver V";
				break;
			    case "Silver V":
                                $next_div = "Silver IV";
                                break;
                            case "Silver IV":
                                $next_div = "Silver III";
                                break;
                            case "Silver III":
                                $next_div = "Silver II";
                                break;
                            case "Silver II":
                                $next_div = "Silver I";
                                break;
                            case "Silver I":
                                $next_div = "Gold V";
 			    case "Gold V":
                                $next_div = "Gold IV";
                                break;
                            case "Gold IV":
                                $next_div = "Gold III";
                                break;
                            case "Gold III":
                                $next_div = "Gold II";
                                break;
                            case "Gold II":
                                $next_div = "Gold I";
                                break;
                            case "Gold I":
                                $next_div = "Platinum V";
 			    case "Platinum V":
                                $next_div = "Platinum IV";
                                break;
                            case "Platinum IV":
                                $next_div = "Platinum III";
                                break;
                            case "Platinum III":
                                $next_div = "Platinum II";
                                break;
                            case "Platinum II":
                                $next_div = "Platinum I";
                                break;
                            case "Platinum I":
                                $next_div = "Diamond V";
	                        break;
			}

                        if ($lp_old == 100) {
                            echo "In Series! Next Division: ".$next_div;
                        } else {
			    echo "Next Division: ".$next_div;
			}
                    ?></p>
            <div class="progress progress-striped active">
                <div class="progress-bar"
                     <?php
                    	$connection = mysql_connect("localhost", "syno", "fiend");
                        $db_name = 'stats';
                        mysql_select_db($db_name, $connection);
 	
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
                        // fetch query results
	                $lp_row = mysql_fetch_assoc($lp_result);
                        $lp_old = $lp_row['lp'];
                        echo "style='width: ".$lp_old."%'";
                    ?>>
                </div>
            </div>    
            <div class="row">
                <div class="col-lg-12">
                    <!-- /.panel -->
                    <?php 
					   echo tablegen(0,0); 
					?>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-upload fa-fw"></i> Add New Entry
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form action="index.php?page=stats&action=add_entry" method="POST" role="form">
								<div class="form-group">
                                    <label>Division:</label>
                                    <input class="form-control" name="division">
								</div>
                                <div class="form-group">
                                    <label>LP:</label>
                                    <input class="form-control" name="lp">
								</div>
                                <div class="form-group">
                                    <label>Champion:</label>
                                    <input class="form-control" name="champion">
								</div>
                                <div class="form-group">
                                    <label>Position:</label>
                                    <input class="form-control" name="position">
								</div>
								<div class="form-group">
									<label>KDA:</label>
                                    <input class="form-control" name="kda">
								</div>
                                <div class="form-group">
									<label>CS:</label>
                                    <input class="form-control" name="cs">
								</div>
                                <div class="form-group">
									<label>Mistakes:</label>
                                    <input class="form-control" name="mistakes">
								</div>
								<div class="form-group">
									<label>Improve By:</label>
                                    <input class="form-control" name="improvements">
                                </div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">Add Entry</button>
							</form>
						</div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
            </div>
