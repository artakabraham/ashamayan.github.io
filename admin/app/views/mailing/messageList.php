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

          <div class="">

            <div class="page-title"></div>



            <div class="clearfix"></div>



            <div class="row">

			  <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                   

                  <div class="x_title">

                    <h2>Messages</h2>

                    <div class="nav navbar-right panel_toolbox">

                        <a href="<?=PATH?>message/add" class="btn btn-primary">New</a>

                    </div>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">

                      <thead>

                        <tr>

                          <th><input type="checkbox" id="check-all" class="flat"></th>

                          <th>Subject</th>

                          <th>Author</th>

                          <th>Send Date</th>

                          <th>Del</th>

                        </tr>

                      </thead>

                      <tbody>

                        <?php foreach($posts as $post):?>

			<tr>

                          <td><input type="checkbox" class="flat" name="table_records"></td>

                          <td><a href="<?=PATH?>message/<?=$post['id']?>"><?=$post['title']?></a></td>

                          <td><?=$post['author']?></td>

                          <td><?=$post['cdate']?></td>

                          <td><a href="message/delete/<?=$post['id']?>"><i class="fa fa-remove"></i></a></td>

                        </tr>

			<?php endforeach;?>

                      </tbody>

                    </table>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

        <!-- /page content -->



        <!-- footer content -->		

        <?php require_once APP.'/views/layouts/footer.php'; ?>