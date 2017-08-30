<?php require_once APP . '/views/layouts/head.php'; ?>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php require_once APP . '/views/layouts/leftBar.php'; ?>
            <!-- top navigation -->
            <?php require_once APP . '/views/layouts/topNav.php'; ?>
            <!-- /top navigation -->
            <!-- page content -->
            <div class="right_col" role="main" id="main">
                <div class="">
                    <div class="page-title"></div>
                    <div class="clearfix"></div>
                    <div class="row" id="grid">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Articles</h2>
                                    <div class="nav navbar-right panel_toolbox">
                                        <a href="menu/add" class="btn btn-primary">Add New</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">                                    
                                    <?php require_once APP . '/views/menu/grid.php'; ?>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
            <!-- footer content -->		
            <?php require_once APP . '/views/layouts/footer.php'; ?>