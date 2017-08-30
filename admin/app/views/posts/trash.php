<div class="page-title"></div>
<div class="clearfix"></div>
<div class="row">
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
                            <th>Date</th>
                            <th>Type</th>
                            <th>Restore</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($trashedPosts as $post): ?>
                            <tr>
                                <td><button onclick="getPostById(this.id)" id="<?=$post['id']?>" class="noborder"><?= $post['title'] ?></button></td>
                                <td><?= $post['cdate'] ?></td>
                                <td><?= $post['type'] ?></td>                          
                                <td><button onclick="postRestore(this.id)" id="<?=$post['id']?>" class="noborder"><i class="fa fa-mail-reply"></i></button></td>
                                <td><button onclick="postRemove(this.id)" id="<?=$post['id']?>" class="noborder"><i class="fa fa-remove"></i></button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
