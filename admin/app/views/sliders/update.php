<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?= $slider['title'] ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form id="imgUpload" method="post" action="slider/edit/<?= $id; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <div class="form-group">                        
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">                
                            <img id="img" style="width: 100%; display: block;" src="<?= $sliderImgPath ?>" alt="<?= $slider['title'] ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">                       
                            <input type="file" name="image" class="form-control col-md-7 col-xs-12" accept="image/*">                            
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
                            <input type="submit" name="submit" value="Upload" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
