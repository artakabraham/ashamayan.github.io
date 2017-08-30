<?php require_once APP.'/views/layouts/head.php'; ?>
  
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
		<?php require_once APP.'/views/layouts/leftBar.php'; ?>

        <!-- top navigation -->
        
		<?php require_once APP.'/views/layouts/topNav.php'; ?>
		
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <?php if(isset($errors)){for($i = 0; $i < count($errors); $i++){echo $errors[$i];}}?>
                  <div class="x_title">
                    <h2>Add Menu Item</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form method="post" class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="name" value="" class="date-picker form-control col-md-7 col-xs-12" type="text">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alias</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="alias" value="" class="date-picker form-control col-md-7 col-xs-12" type="text">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input value="Add" type="submit" name="submit" class="btn btn-success" />
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
<?php require_once APP.'/views/layouts/footer.php';