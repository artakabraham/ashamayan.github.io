<div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="x_panel">
            <?
            if (isset($success)) {
                echo $success;
            }
            ?>
            <?
            if (isset($errors)) {
                for ($i = 0; $i < count($errors); $i++) {
                    echo $errors[$i];
                }
            }
            ?>
            <div class="page-title">
                <input type="hidden" name="id" id="id" value="<?= $postID['id'] ?>">
                <input type="text" id="title" name="title" value="<?= $postID['title'] ?>" placeholder="Title" class="form-control">
            </div>
            <div class="clearfix"></div>
            <textarea name="editor1" id="editor1"><?= $postID['content'] ?></textarea>
            <br />
            <div class="ln_solid"></div>
            <button onclick="bookUpdate()" name="submit" value="Update" class="btn btn-primary">Update</button>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Publish date</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
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
                <input name="price" id="price" type="number" value="<?= $metaPrice['meta_value'] ?>" class="form-control has-feedback-left">
                <span class="fa fa-rouble form-control-feedback left" aria-hidden="true"></span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Upload PDF</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">                 
                <a href="books/download/<?= $metaValue['post_id'] ?>" id="flname"><?= $fileName ?></a>
                <div class="ln_solid"></div>
                <form id="pdfUpload" method="post" action="books/joinpdf/<?= $id ?>" enctype="multipart/form-data">
                    <input name="file" type='file' class="form-control" required/>
                    <div class="ln_solid"></div>
                    <div id="progress" style="display:none;">
                        <div class="progress progress-striped">
                            <div class="progress-bar progress-bar-success" data-transitiongoal="100" aria-valuenow="0" style="width: 0%;"></div>
                        </div>
                    </div>
                    <span id="response"></span>
                    <input type="submit" name="submit" value="Upload" class="btn btn-primary">
                </form>
            </div>
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




