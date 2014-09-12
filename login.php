<?php



$warningtext = "";

if (isset($_GET['warning'])) {
	switch($_GET['warning']) {
		case "badlogin":
		$warningtext = "<div id=\"fade\" style=\"vertical-align: middle;text-align:center;margin-left:auto;margin-right:auto;width:500px;\" class=\"alert alert-warning\">Invalid Credentials.</div>";
		break;
        case "goodlogin":
		$warningtext = "<div id=\"fade\" style=\"vertical-align: middle;text-align:center;margin-left:auto;margin-right:auto;width:500px;\" class=\"alert alert-success\">You have successfully logged in.</div>";
		break;
		case "unknown":
		$warningtext = "<div id=\"fade\" style=\"vertical-align: middle;text-align:center;margin-left:auto;margin-right:auto;width:500px;\" class=\"alert alert-danger\">An error has occurred. You have been logged out.</div>";
		break;
		case "loggedout":
		$warningtext = "<div id=\"fade\" style=\"vertical-align: middle;text-align:center;margin-left:auto;margin-right:auto;width:500px;\" class=\"alert alert-success\">You are logged out.</div>";
		break;
        case "createsuccess":
        $warningtext = "<div id=\"fade\" style=\"vertical-align: middle;text-align:center;margin-left:auto;margin-right:auto;width:500px;\" class=\"alert alert-success\">You have successfully created your account. Please login using your credentials.</div>";
        break;
        case "failcreate":
        $warningtext = "<div id=\"fade\" style=\"vertical-align: middle;text-align:center;margin-left:auto;margin-right:auto;width:500px;\" class=\"alert alert-danger\">The username you provided already exists.</div>";
        break;
		default:
		$warningtext = "";
		break;
	}
}


//require supporting functions
require_once("tablegen.php");
require_once("gen_roster.php");
require_once("checklogin.php");
require_once("add_entry.php");
require_once("add_roster.php");
require_once("add_teamcomp.php");
require_once("genchecklist.php");
require_once("gen_team_comp.php");
require_once("genlatestmsg.php");

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>NashorDB: A Database Management Dashboard - Chris Luk Dot Im</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/bootswatch.min.css">
      <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
    <script src="bootstrap.min.js"/>
    <script src="/js/jquery.min.js"/>
    <script>

     var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

     (function() {
       var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
       ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();

    </script>
  </head>
    
    <body style="background-size:100%;background-position:absolute;background-attachment:fixed;" background="img/nashor_bg.png">
        
        
 <div class="container">
    <div class="outer">
        <div class="inner">       
        
    <div class="navbar navbar-default nav-fixed-top" style="margin-top:-30px;background-color: transparent">
      <div class="container">
        <div class="navbar-header" style="background:transparent; background-color:transparent;">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li>
              <button style="background-color: #FFFFFF;border: 1px solid #bebebe;" class="btn btn-default" data-toggle="modal" href="#about-modal">ABOUT</button>
              <!-- Modal -->
            </li>
            <li class="dropdown">
              <button style="margin-left:12px;background-color: #FFFFFF;border: 1px solid #bebebe;" class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#" id="download">LINKS <span class="caret"></span></button>
              <ul class="dropdown-menu" aria-labelledby="download">
                <li><a href="http://lolking.net">LOLKING</a></li>
                <li><a href="http://op.gg">OP.GG</a></li>
                <li class="divider"></li>
                <li><a href="http://twitter.com/emperorsyno">Twitter</a></li>
                <li><a href="http://github.com/cluk2971">GitHub</a></li>
              </ul>
            </li>
          </ul>
        <div align="right">
            <form action="index.php?action=login" method="POST" role="form">
                <ul>
                <fieldset>
                    <div class="form-group">
                    <input placeholder="RIOT" style="width:150px; margin-left:397px;" type="text" class="input-md form-control col-lg-4" name="username" value=""><input placeholder="GAMES" style="margin-left:12px;width:150px;" type="password" class="input-md form-control col-lg-4" name="password" value="">
                    </div>
                </fieldset>
                <input type="submit" name="sent" class="btn btn-primary btn-md" style="margin-right:111px;width:100px;margin-top:-64px;" value="Login"></ul></form>
                <ul>
                <button style="width:100px;margin-top:-129px;margin-left:12px;" class="btn btn-md btn-danger" style="color: #000000" data-toggle="modal" href="#register-modal">Register</button>
                </ul>
        </div>

        </div>
      </div>
    </div>
        
    <?php echo $warningtext; ?>
    
      <!--<div style="margin-top:300px;margin-left:820px;position:absolute;overflow: hidden;" align="middle" class="col-lg-4">
            <div class="bs-component">
              <h2 style="color:white;">Post-Game Logging System</h2><br>
              <p style="margin-left:3em;color:white;" align="left">&#8594; Record your match details by filling out forms</p>
              <p style="margin-left:3em;color:white;" align="left">&#8594; Actively view your progress on a user-friendly table</p>
              <p style="margin-left:3em;color:white;" align="left">&#8594; List mistakes or things you could have done differently</p>
            </div>
        </div>  
        -->
        
        
    <div style="margin-top:85px;margin-left:auto;margin-right:auto;" class="modal fade" id="about-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button style="color:black;" type="button" class="close" data-dismiss="modal">×</button>
                      <h4 class="modal-title">About NashorDB</h4>
                    </div>
                    <div class="modal-body">
                      NashorDB is a database management tool that helps to aid those in hopes of climbing ELO. Instead of manually logging your data in a Google Docs spreadsheet, NashorDB offers a user-friendly interface to record your match history details while filling in additional comments that will remind you to focus on the elements of the game where you are lacking, and make less of those mistakes as you try and succeed through ranked solo.<br><br>
                      All images and artwork on this website are owned by Riot Games.
                    </div>
                    <div class="modal-footer">
                      <p align="left">&copy; CHRISLUK &nbsp;&nbsp;</p>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
        
        
        <!--START OF REGISTER MODAL-->
        <div style="margin-top:85px;margin-left:auto;margin-right:auto;" class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button style="color:black;" type="button" class="close" data-dismiss="modal">×</button>
                      <h4 class="modal-title">Register Form</h4>
                    </div>
                    <form class="form-horizontal" action="index.php?action=register" method="POST" role="form">
                    <div class="modal-body" style="height:250px;">
                            <fieldset>
                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputName" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUsername" class="col-lg-2 control-label">Username</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputUsername" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="inputPassword" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="email" class="form-control" name="inputEmail" placeholder="Email">
                            </div>
                        </div>
                        </fieldset>

                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-default">Register Now</button>
                    </div>
                    </form>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->    
        <!-- END OF REGISTER MODAL -->
        
    <div class="container" style="margin-top:-70px;">
      <div class="page-header" id="banner">
        <div class="row">
            <br><br><br><br><br><br><br>
          <div style="margin-top:100px;" class="col-lg-12">
              <div style="position: relative; left: 0; top: 0;">
                  <img align="left" style="margin-left:615px;position: absolute; top:-257px; height:375px; weight:375px;overflow: hidden;" src="img/nashordb_logo2.png"/>
                  <img align="middle" style="position: relative;overflow: hidden; margin-left:-20px;top:-310px;height:500px; weight:500px;" src="img/fadedbaron.png"/>
                  <button style="margin-top:-170px;margin-left:133px;width:200px;" id="showMe" class="disabled btn btn-danger">▼&nbsp;&nbsp;&nbsp;&nbsp;SHOW ME&nbsp;&nbsp;&nbsp;&nbsp;▼ </button>
              </div>
       
            
    <div style="margin-top:-245px;" id="table" class="row">
        <div class="page-header">
            <h1 id="tables" style="color:white;">MATCH HISTORY LOGS</h1>
         </div>
         <div class="col-lg-12">
              <div class="col-lg-6">
                  <img style="height:100%;width:100%;margin-top:0px;margin-left: -25px;margin-right: auto;" src="img/mhl_data.png"/>
              </div>
              <div class="col-lg-6">
                  <img style="height:100%;width:100%;margin-top:25px;margin-left: auto;margin-right: auto;" src="img/sample_table.png"/>
              </div>
         </div>
         
        <div class="col-lg-12">
        <!--FORM TO ADD ENTRY-->
            <div class="row">
                <div style="margin-top:75px;" class="page-header">
                    <h1 id="tables" style="color:white;">USER-FRIENDLY FORMS</h1>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <i class="fa fa-upload fa-fw"></i> LOG NEW ENTRY
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form action="index.php?page=stats&action=add_entry" method="POST" role="form">
                            <div class="col-lg-4">
								<div class="form-group">
                                    <label>Division:</label>
                                    <select class="form-control" id="select" name="division">
                                        <option>Master</option>
                                        <option>Challenger</option>
                                        <option>Diamond I</option>
                                        <option>Diamond II</option>
                                        <option>Diamond III</option>
                                        <option>Diamond IV</option>
                                        <option>Diamond V</option>
                                        <option>Platinum I</option>
                                        <option>Platinum II</option>
                                        <option>Platinum III</option>
                                        <option>Platinum IV</option>
                                        <option>Platinum V</option>
                                        <option>Gold I</option>
                                        <option>Gold II</option>
                                        <option>Gold III</option>
                                        <option>Gold IV</option>
                                        <option>Gold V</option>
                                        <option>Silver I</option>
                                        <option>Silver II</option>
                                        <option>Silver III</option>
                                        <option>Silver IV</option>
                                        <option>Silver V</option>
                                        <option>Bronze I</option>
                                        <option>Bronze II</option>
                                        <option>Bronze III</option>
                                        <option>Bronze IV</option>
                                        <option>Bronze V</option>
                                    </select>
								</div>
                                <div class="form-group">
                                    <label>Current LP:</label>
                                    <input placeholder="0" type="number" name="quantity" min="0" max="100" class="form-control" name="lp" disabled>
								</div>
                                <div class="form-group">
                                    <label>Champion:</label>
                                    <input class="form-control" name="champion" disabled>
								</div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Position:</label>
                                    <select class="form-control" id="select" name="position">
                                        <option>Top</option>
                                        <option>Jungle</option>
                                        <option>Mid</option>
                                        <option>Marksman</option>
                                        <option>Support</option>
                                    </select>
								</div>
                            
								<div class="form-group">
									<label>KDA:</label>
                                    <input placeholder="0/0/0" class="form-control" name="kda" disabled>
								</div>
                                <div class="form-group">
									<label>CS:</label>
                                    <input placeholder="0" type="number" name="quantity" min="0" max="650" class="form-control" name="cs" disabled>
								</div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
									<label>Mistakes:</label>
                                    <input class="form-control" name="mistakes" disabled>
								</div>
								<div class="form-group">
									<label>Improve By:</label>
                                    <input class="form-control" name="improvements" disabled>
                                </div>
                            <div class="form-group">
							<button type="submit" align="center" style="margin-top:35px;" class="disabled btn btn-danger btn-lg btn-block">Add Entry</button></div>
                            </div>
							</form>

                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
            </div>
        </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
                    <h1 id="tables" style="color:white;">MOST PLAYED CHART</h1>
            </div>
            <img align="middle" style="position: relative;height:100%;width:100%;" src="http://i.imgur.com/6dDBSOO.png"/>
          </div>
        </div>
        
        <!-------------- REVIEWS -------------->
        <div class="row">
          <div class="col-lg-12">
              <br><br><br>
            <div style="margin-top:125px;" class="page-header">
                    <h1 id="tables" style="color:white;">REVIEWS</h1>
            </div>
          </div>
        </div>
          <div class="col-lg-6">
            <div class="bs-component">
              <blockquote>
                <p style="color:#4cbbfa;">This is such an awesome way to track your progress in soloQ. I'm definitely going to keep using this and make my way to Gold!</p>
                <small style="color:#A162E1;"><cite title="Source Title">Emperor Googz</cite></small>
              </blockquote>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="bs-component">
              <blockquote class="pull-right">
                <p style="color:#4cbbfa;">No more need for Google Docs. This dashboard is the best way to log your improvements in ranked. List your mistakes, LP gain, and KDA!</p>
                <small style="color:#A162E1;"> <cite title="Source Title">Chombol</cite></small>
              </blockquote>
            </div>
          </div>
        
    

        
        
        
        
        
        
        
        
        <br><br><br><br><br><br>
        
       
      <footer>
          <br><br>
          
        <div class="row">
          <div class="col-lg-12">
            <p style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;Made by <a style="color:#A162E1;" href="http://chrisluk.im" rel="nofollow">Chris Luk</a>. Email: <a style="color:#A162E1;" href="mailto:luk@chrisluk.im">baron@nashordb.net</a>.</p>
            <p style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;Code released under the <a style="color:#A162E1;" href="https://github.com/thomaspark/bootswatch/blob/gh-pages/LICENSE">MIT License</a>.</p>
            <p style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;Based on <a style="color:#A162E1;" href="http://getbootstrap.com" rel="nofollow">Bootstrap</a>. Icons from <a style="color:#A162E1;" href="http://fortawesome.github.io/Font-Awesome/" rel="nofollow">Font Awesome</a>. Web fonts from <a style="color:#A162E1;" href="http://www.google.com/webfonts" rel="nofollow">Google</a>.</p>
          </div>
        </div>

      </footer>


    </div>
    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"/>
    <script src="js/bootstrap.js"/>
    <!--<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->
    <script src="assets/js/bootswatch.js"></script>
    <script>
        setTimeout(function() {
            $('#fade').fadeOut('fast');
        }, 2500);    
    </script>
        <script>
        $("#showMe").on("click" ,function(){
            scrolled=scrolled-300;
            $(".cover").animate({
                scrollTop:  scrolled
            });
        });
        </script>
    <script>
	$(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});
	</script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  </body>
</html>
