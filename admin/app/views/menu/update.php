<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <? if (isset($success)) echo $success; ?>
            <? if (isset($errors)) echo $errors; ?>              
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
                            <input name="name" value="<?= $menuById['title']; ?>" class="date-picker form-control col-md-7 col-xs-12" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alias</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="alias" value="<?= $menuById['descript']; ?>" class="date-picker form-control col-md-7 col-xs-12" type="text">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input value="Update" type="submit" name="submit" class="btn btn-success" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

