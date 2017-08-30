<div class="page-title"></div>
<div class="clearfix"></div>
<div class="row" id="grid">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?= ucfirst($alias) ?></h2>
                <div class="nav navbar-right panel_toolbox">
                    <button onclick="menuNew()" class="btn btn-primary">New</button>
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
                            <th>Order</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $post): ?>
                            <tr>                
                                <td><button onclick="getMenuById(this.id)" id="<?= $post['id'] ?>" class="noborder"><?= $post['title'] ?></button></td>
                                <td><?= $post['author'] ?></td>
                                <td><?= $post['cdate'] ?></td>
                                <td><button id="<?= $post['id'] ?>" onclick="swapeMenu(this.id)" class="fa fa-arrow-circle-o-up noborder"></button></td>
                                <td><? if ($post['status'] == 1): ?>
                                        <button class="fa fa-check-square-o noborder" onclick="changeState(this.id)" id="<?= $post['id'] ?>"></button> 
                                    <? else: ?>
                                        <button class="fa fa-square-o noborder" onclick="changeState(this.id)" id="<?= $post['id'] ?>"></button>
                                    <? endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>                                   
            </div>
        </div>
    </div>
</div>