            <div class="row">
                <div class="col-lg-6">
                    <!-- /.panel -->
                     <?php echo gen_roster(0,0); ?>
                </div>
                <!-- /.col-lg-6 -->
				<div class="col-lg-6">
                    <?php echo gen_team_comp(0,0); ?>

                </div>
				<div class="col-lg-12">
                    <!-- /.panel -->
                     <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Announcements
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <p>Bronze I: 3 Wins, 2 Losses</p>
                            <p>Keep it up team!</p> 
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Most Played Champions
                        </div>
                        <div class="panel-body">
                            <div style="height:450px;" id="morris-file-bar">
				            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Highest Win Rate Champions
                        </div>
                        <div class="panel-body">
                            <div style="height:450px;" id="morris-file-bar">
				            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->