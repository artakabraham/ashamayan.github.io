<div class="page-title"></div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Articles</h2>
                <div class="nav navbar-right panel_toolbox">
                    <button onclick="bookNew()" class="btn btn-primary">New</button>
                </div>
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
                                <td><button onclick="getBookById(this.id)" id="<?= $post['id'] ?>" class="noborder"><?= $post['title'] ?></button></td>
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
