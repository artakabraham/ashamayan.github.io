<li>
    <a><i class="fa fa-clone"></i>Pages<span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li><div onclick="postNew()">New</div></li>
        <?php foreach ($this->menuItems as $item): ?>
            <li><div onclick="loadGrid('<?= $item['slug'] ?>')"><?= $item['name'] ?></div></li>
        <?php endforeach; ?>
        <li><div class="noborder" onclick="loadTrash()">Trash</div></li>
    </ul>
</li>