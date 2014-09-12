        <div class="row">
            <div class="col-lg-6">
            <div class="bs-component">
              <div class="alert alert-dismissable alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>DASHBOARD</strong><br>Here you'll find all your important data.
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="bs-component">
              <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>STATISTICS > PERFORMANCE CHART</strong><br>In order to begin logging your data.
              </div>
            </div>
          </div>
          
        </div>    
        <div class="row">
                <div class="col-lg-12">
                    <!-- /.panel -->
                     <div class="panel panel-danger">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Announcements
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <p>Mandate of Heaven will become inactive soon. At least we made Bronze!</p>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Your Most Played Champions
                        </div>
                        <div class="panel-body">
                            <div style="height:350px;" id="morris-file-bar">
				            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-6">
                    <!-- /.panel -->
                     <?php echo gen_roster(0,0); ?>
                </div>
                <!-- /.col-lg-6 -->
				<div class="col-lg-6">
                    <?php echo gen_team_comp(0,0); ?>

                </div>
            </div>
            <!-- /.row -->