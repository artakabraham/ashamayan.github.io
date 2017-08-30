<div id="secondary">
    <aside id="recent-posts-2" class="widget widget_recent_entries">
            <h3 class="widget-title"><span><?=$postList[0]['type']?></span></h3>
            <ul>
                <?php foreach($postList as $postItem):?>
                <li> <a href="/articles/<?=$postItem['id']?>"><?=$postItem['title'];?></a></li>
                <?php endforeach;?>
            </ul>
    </aside>
</div>