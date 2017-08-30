<div class="col-md-2 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Pages</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-md-2 col-sm-6 col-xs-12 form-group has-feedback">                
                <div class="checkbox">
                    <? foreach($permissions as $permission):?>
                    <label><input id="<?= $permission['post_id'] ?>" onclick="setPermission(this.id)" type="checkbox" <? if($permission['user_id'])echo "checked";?>><?= $permission['name'] ?></label>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-2 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Moduls</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-md-2 col-sm-6 col-xs-12 form-group has-feedback">                
                <div class="checkbox">
                    <? foreach($menu as $menu):?>
                    <label><input id="<?= $menu['post_id'] ?>" onclick="setPermission(this.id)" type="checkbox" <? if($menu['user_id'])echo "checked";?>><?= $menu['name'] ?></label>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

