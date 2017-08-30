<?php include APP. '/views/layouts/header.php';?>
<div id="main" class="clearfix">
    <div class="inner-wrap clearfix">
        <div id="primary">
            <div id="content" class="clearfix">
                <header class="entry-header"><h1 class="entry-title"><?=$newsItem['title']?></h1></header>
                <figure class="post-featured-image">
                    <a href="/articles/<?=$newsItem['id']?>" title="<?=$newsItem['title']?>">
                        <img width="720" height="300" src="<?=Articles::getImage($newsItem['id'],'article');?>" class="attachment-featured-blog-large size-featured-blog-large wp-post-image" alt="<?=$newsItem['title']?>" title="<?=$newsItem['title']?>" /></a>
                </figure>
                <article class="post-19 page type-page status-publish has-post-thumbnail hentry">
                    
                    <div class="entry-content clearfix">
                        <p><?=$newsItem['content']?></p>
                    </div>
                </article>
                <div id="comments" class="comments-area">
                    <div class="fb-comments" data-href="http://ashamayan.com/" data-width="720px" data-numposts="5"></div>
                </div>
            </div>
        </div>
        <div id="secondary">
            
            <aside id="recent-posts-2" class="widget widget_recent_entries">
                <h3 class="widget-title"><span>Статьи</span></h3>
                <ul>
                    <?php foreach($topArticles as $article):?>
                    <li>
                        <a href="/<?=$article['type']?>/<?=$article['id']?>"><?=$article[ 'title'];?></a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </aside>
            
            <aside id="recent-posts-2" class="widget widget_recent_entries">
                <h3 class="widget-title"><span>Программы</span></h3>
                <ul>
                    <?php foreach($topPrograms as $postItem):?>
                    <li>
                        <a href="/<?=$postItem['type']?>/<?=$postItem['id']?>"><?=$postItem[ 'title'];?></a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </aside>
            
            <aside id="recent-posts-2" class="widget widget_recent_entries">
                <h3 class="widget-title"><span>Блог</span></h3>
                <ul>
                    <?php foreach($topBlog as $blog):?>
                    <li>
                        <a href="/<?=$blog['type']?>/<?=$blog['id']?>">
                            <?=$blog['title'];?>
                        </a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </aside>
        </div>
    </div>
</div>
<?include APP. '/views/layouts/footer.php'?>