<div class="page-title"></div>
<div class="clearfix"></div>
<div class="row" id="grid">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?= ucfirst($alias) ?></h2>
                <? if (Options::getPermission($this->user['id'], 'new')): ?>
                <div class="nav navbar-right panel_toolbox">
                    <button onclick="postNew()" class="btn btn-primary">New</button>
                </div>
                <? endif; ?>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Slider</th>
                            <th>Trash</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $post): ?>
                            <tr>
                                <td name="table_records"><button class="noborder" onclick="getPostById(this.id)" id="<?= $post['id'] ?>"><?= $post['title'] ?></button></td>
                                <td><?= $post['author'] ?></td>
                                <td><?= $post['cdate'] ?></td>
                                <td>
                                    <? if ($post['slider'] == 1): ?> 
                                    <button onclick="sliderRemove(this.id, this.value)" id="<?=$post['id']?>" value="<?= $post['type']?>" class="noborder"><i class="fa fa-check-square-o"></i></button>
                                    <? else: ?>
                                    <button onclick="sliderEdit(this.id)" id="<?=$post['id']?>" class="noborder"><i class="fa fa-square-o"></i></button>
                                    <? endif; ?>
                                </td>
                                <td><button id="<?= $post['id'] ?>" onclick="postTrash(this.id, this.value)" value="<?= $post['type']?>" class="noborder"><i class="fa fa-remove"></i></button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>