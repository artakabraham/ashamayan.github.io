<div class="page-title"></div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Messages</h2>
                <div class="nav navbar-right panel_toolbox">
                    <button onclick="messageNew()" class="btn btn-primary">New</button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Author</th>
                            <th>Send Date</th>
                            <th>Del</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $post): ?>
                            <tr>
                                <td><button onclick="getMessageById(this.id)" id="<?= $post['id'] ?>" class="noborder"><?= $post['title'] ?></button></td>
                                <td><?= $post['author'] ?></td>
                                <td><?= $post['cdate'] ?></td>
                                <td><button id="<?=$post['id'] ?>" onclick="messageDelete(this.id)" class="noborder"><i class="fa fa-remove"></i></button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>