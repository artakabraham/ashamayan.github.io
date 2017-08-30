<div class="row">
    <div class="page-title"></div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Main Slider</h2>
                    <div class="nav navbar-right panel_toolbox">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Del</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($mainSlider as $slider): ?>
                                <tr>
                                    <td><button onclick="sliderEdit(this.id)" class="noborder" id="<?= $slider['id']?>"><?= $slider['title'] ?></button></td>                                    
                                    <td><?=$slider['type']?></a></td>
                                    <td><button onclick="sliderRemove(this.id, this.value)" id="<?=$slider['id']?>" value="slider" class="noborder"><i class="fa fa-remove"></i></button></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
