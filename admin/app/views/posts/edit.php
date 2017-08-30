<div class="row">
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="x_panel">
            <? if (isset($errors)) echo $error; ?>
            <div class="page-title">
                <input type="hidden" name="id" id="id" value="<?= $postID['id'] ?>">
                <input name="title" id="title" type="text" value="<?= $postID['title'] ?>" placeholder="Title" class="form-control">
            </div>
            <div class="clearfix"></div>
            <textarea name="editor1" id="editor1"><?= $postID['content'] ?></textarea>
            <br />
            <div class="ln_solid"></div>
            <button name="submit" value="Update" onclick="postUpdate()" class="btn btn-primary">Update</button>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Post Type</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <select id="type" name="type" class="select2_single form-control">
                        <?php foreach ($types as $type): ?>
                            <option <?php
                            if ($postID['type'] == $type['slug']) {
                                echo "selected";
                            }
                            ?> value="<?= $type['slug'] ?>"><?= $type['name'] ?></option>
                            <?php endforeach; ?>
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
                <input name="startdate" type="text" value="<?= $postID['startdate'] ?>" class="form-control has-feedback-left" id="single_cal1">
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
                <input id="price" name="price" type="number" value="<?= $metaPrice['meta_value'] ?>" class="form-control has-feedback-left">
                <span class="fa fa-rouble form-control-feedback left" aria-hidden="true"></span>
            </div>
            <label><input onclick="isChecked(this.id)" id="isPaid" type="checkbox" value="<?= $postID['is_paid'] ?>" name="isPaid" <?php if ($postID['is_paid'] == 1) echo "checked" ?>> paid</label>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Featured Image</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="img-thumbnail">
                    <div class="image view view-first">
                        <img id="featuredImg" style="width: 100%; display: block;" src="<?= Posts::getImage($postID['id']); ?>" alt="image" />
                    </div>
                </div>
                <br />
                <div class="ln_solid"></div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Set Image</button>  
            </div>
        </div>            
    </div>
</div>
