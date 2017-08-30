<div class="page-title"></div>
<div class="clearfix"></div>
<div class="row" id="grid">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?=ucfirst($alias)?></h2>
                <div class="nav navbar-right panel_toolbox">
                    <button onclick="userCreate()" class="btn btn-primary">New</button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Subscribe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td name="table_records"><button value="<?=$user['id']?>" onclick="getUserPermissions(this.value)" class="noborder"><?=$user['name'] ?></button></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['phone'] ?></td>
                                <td><?= $user['cdate'] ?></td>
                                <td><?php if ($user['subscribe']): ?>
                                        <i class="fa fa-check-square-o"></i>
                                    <?php else: ?>                                     
                                        <i class="fa fa-square-o"></i>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row" id="userData">
</div>