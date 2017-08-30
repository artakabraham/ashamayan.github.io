<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Upload Image</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <? if (isset($errors)) echo $errors ?>
                <br>
                <form id="imgUpload" method="post" action="gallery/new" enctype="multipart/form-data" class="form-horizontal form-label-left"> 
                    <div class="form-group">                        
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">                
                            <img id="img" style="width: 100%; display: block;" src="/images/slider/no-image.jpg" alt="no-image.jpg" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file">File<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="file1" id="upload" type="file" required="required" accept="image/*" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="description" type="text" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group" id="progress" style="display:none;">
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-success" data-transitiongoal="100" aria-valuenow="0" style="width: 0%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input name="submit" type="submit" value="Upload" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
