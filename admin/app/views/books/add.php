<?php require_once APP. '/views/layouts/head.php'; ?>
<body class="nav-md">
   <div class="container body">
   <div class="main_container">
   <?php require_once APP. '/views/layouts/leftBar.php'; ?>
   <!-- top navigation -->
   <?php require_once APP. '/views/layouts/topNav.php'; ?>
   <!-- /top navigation -->
   <!-- page content -->
   <div class="right_col" role="main">
      <div class="row">
         <form method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
            <div class="col-md-9 col-sm-9 col-xs-12">
               <div class="x_panel">
                <?php if(isset($errors)){for($i = 0; $i < count($errors); $i++){echo $errors[$i];}}?>    
                  <div class="page-title">
                  <input type="text" name="title" value="" placeholder="Title" class="form-control">
                  </div>
                  <div class="clearfix"></div>
                  <textarea name="editor1" id="editor1"></textarea>
                  <br />
                  <div class="ln_solid"></div>
                  <input type="submit" name="submit" value="Add" class="btn btn-default" />
               </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
               <div class="x_panel">
                  <div class="x_title">
                     <h2>Publish date</h2>
                     <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                     </ul>
                     <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <input name="startdate" class="form-control has-feedback-left" id="single_cal1">
                     <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                  </div>
               </div>
            </div>
			<div class="col-md-3 col-sm-3 col-xs-12">
               <div class="x_panel">
                  <div class="x_title">
                     <h2>Price</h2>
                     <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                     </ul>
                     <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <input name="price" type="number" class="form-control has-feedback-left" id="single_cal1">
                     <span class="fa fa-rouble form-control-feedback left" aria-hidden="true"></span>
                  </div>
               </div>
            </div>
           <div class="col-md-3 col-sm-3 col-xs-12">
               <div class="x_panel">
                  <div class="x_title">
                     <h2>Choose File</h2>
                     <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                     </ul>
                     <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <input name="file" type='file' class="form-control has-feedback-left">
                     <span class="fa fa-file-pdf-o form-control-feedback left" aria-hidden="true"></span>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
   <!-- /page content -->
   <script type="text/javascript">
      CKEDITOR.replace('editor1');
   </script>
   <!-- footer content -->
   <?php require_once APP. '/views/layouts/footer.php';