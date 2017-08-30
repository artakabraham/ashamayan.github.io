<?include APP.'/views/layouts/header.php'?>
        <div id="main" class="clearfix">
            <div class="inner-wrap clearfix">
                <div id="primary">
                    <div id="content" class="clearfix">
                        <?php foreach($NewsList as $newsItem):?>
						<article id="post-122" class="post-122 post type-post status-publish format-standard has-post-thumbnail hentry category-featured category-nature tag-beach tag-forest tag-ocean">
                            <header class="entry-header">
                                <h2 class="entry-title"> <a href="/programs/<?=$newsItem['id']?>" title="<?=$newsItem['author']?>"><?=$newsItem['title']?></a></h2> </header>
								
								<figure class="post-featured-image">
									<a href="/programs/<?=$newsItem['id']?>" title="<?=$newsItem['title']?>"><img width="720" height="300" src="<?=Articles::getImage($newsItem['id'],'article');?>" class="attachment-featured-blog-large size-featured-blog-large wp-post-image" alt="<?=$newsItem['title']?>" title="<?=$newsItem['title']?>" />
										<noscript><img width="720" height="300" src="<?=Articles::getImage($newsItem['id']);?>" class="attachment-featured-blog-large size-featured-blog-large wp-post-image" alt="A Beautiful Spot to enjoy holiday" title="A Beautiful Spot to enjoy holiday" />
										</noscript>
									</a>
								</figure>
                                                    
                            <div class="entry-content clearfix">
                                <div class="entry-meta"><span class="sep">
								<span class="post-format"><i class="fa "></i></span></span>
								<span class="tag-links"><i class="fa fa-tags"></i><a href="" rel="tag">beach</a>, <a href="" rel="tag">forest</a>, <a href="" rel="tag">ocean</a></span>
								</div>
                                <p><?=$newsItem['descript']?>...<a href="/programs/<?=$newsItem['id']?>" class="more-link">
                                
                                <span>Читать далее</span></a></p>
                            </div>
                                                    
                        </article>
						<?php endforeach; ?>
                    </div>
                </div>
                
            <div id="secondary">
               <aside id="recent-posts-2" class="widget widget_recent_entries">
                        <h3 class="widget-title"><span><?=$topPrograms[0]['type']?></span></h3>
                        <ul>
                            <?php foreach($topPrograms as $postItem):?>
                            <li> <a href="/programs/<?=$postItem['id']?>"><?=$postItem['title'];?></a></li>
                            <?php endforeach;?>
                        </ul>
                </aside>
               <aside id="recent-posts-2" class="widget widget_recent_entries">
                        <h3 class="widget-title"><span><?=$topArticles[0]['type']?></span></h3>
                        <ul>
                            <?php foreach($topArticles as $article):?>
                            <li> <a href="/programs/<?=$article['id']?>"><?=$article['title'];?></a></li>
                            <?php endforeach;?>
                        </ul>
                </aside>
                <aside id="recent-posts-2" class="widget widget_recent_entries">
                    <h3 class="widget-title"><span><?=$topBlog[0]['type']?></span></h3>
                    <ul>
                        <?php foreach($topBlog as $blog):?>
                        <li>
                            <a href="/blog/<?=$glog['id']?>">
                                <?=$blog[ 'title'];?>
                            </a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </aside>
            </div>			
        </div>
    </div>
 <?include APP.'/views/layouts/footer.php';?>