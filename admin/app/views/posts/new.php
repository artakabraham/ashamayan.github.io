<div class="row">
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="x_panel">
            <? if (isset($errors)) echo $errors; ?>    
            <div class="page-title">
                <input type="text" name="title" id="title" value="" placeholder="Title" class="form-control">
            </div>
            <div class="clearfix"></div>
            <textarea name="editor1" id="editor1"></textarea>
            <br />
            <div class="ln_solid"></div>
            <button onclick="postInsert()" name="submit" value="Add" class="btn btn-primary">Add</button>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Select post type</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display: block;">
                <div class="form-group">
                    <select id="type" class="select2_single form-control" name="type">
                        <? foreach ($types as $type): ?>
                            <option value="<?= $type['slug'] ?>"><?= $type['name'] ?></option>
                        <? endforeach; ?>
                    </select>
                </div>
            </div>
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
</div>