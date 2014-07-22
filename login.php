<?php

$warningtext = "";

if (isset($_GET['warning'])) {
	switch($_GET['warning']) {
		case "badlogin":
		$warningtext = "<div class=\"alert alert-danger text-center\">Invalid Credentials.</div>";
		break;
		case "unknown":
		$warningtext = "<div class=\"alert alert-danger text-center\">An error has occurred. You have been logged out.</div>";
		break;
		case "loggedout":
		$warningtext = "<div class=\"alert alert-danger text-center\">You are logged out.</div>";
		break;
		default:
		$warningtext = "";
		break;
	}
}

?>



<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NashorDB: A Database Management Dashboard - Login</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body background="http://i.imgur.com/ohf85Wj.png">

    <div class="container" id="cont">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
				<a href="login.php"><img style="margin-top:90px;margin-bottom:-125px;" src="http://i.imgur.com/a3pgxPM.png" /></a>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                    	<i class="fa fa-sign-in fa-fw"></i> Sign In
                    </div>
                    <div class="panel-body">
                        <form action="index.php?action=login" method="POST" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" <?php if (isset($_GET['username'])) { echo "value=\"".$_GET['username']."\""; } ?>name="username" type="username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="sent" value="Smite" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        </form>
                    </div>
                </div>
				<?php echo $warningtext; ?>
            </div>
        </div>
    </div>
</body>

</html>
