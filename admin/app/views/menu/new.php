<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <? if (isset($errors)) echo $errors; ?>
            <? if (isset($success)) echo $success; ?>            
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
                <form class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="name" id="name" value="" class="date-picker form-control col-md-7 col-xs-12" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alias*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="alias" id="alias" value="" class="date-picker form-control col-md-7 col-xs-12" type="text" required>
                        </div>
                    </div>
                </form>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-3">
                        <button onclick="menuInsert()" name="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
