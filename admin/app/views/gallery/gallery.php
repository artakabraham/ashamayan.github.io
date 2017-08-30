<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Media Gallery <small>choose folder</small></h2>
                <div class="nav navbar-right panel_toolbox">
                    <button onclick="upload()" class="btn btn-primary">New</button>
                </div>
                <div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <select name="folder" id="folder" onchange="getImages(this.value)" class="form-control">
                            <?php foreach ($uploadDates as $date): ?>
                                <option value="<?= $date['value'] ?>"><?= $date['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <span id="loading"><i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size:31px;"></i></span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row" id="txtHint"></div>
            </div>
        </div>
    </div>
</div>
