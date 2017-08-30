<?include APP. '/views/layouts/header.php'?>
<div id="main" class="clearfix">
   <div class="inner-wrap clearfix">
      <div id="primary">
         <?php foreach($getBooks as $book):?>
          <div class="book">
          <div id="primary_two">
            <div id="content" class="clearfix">
               <div class="images">
                  <a href="books/<?=$book['id']?>">
                      <img width="530" height="530" src="<?=$book['thumbnail']?>" class="attachment-shop_single size-shop_single wp-post-image" alt="<?=$book['title']?>" title="<?=$book['title']?>" />
                  </a>
               </div>
            </div>
         </div>         
         <div class="summary entry-summary">
             <h1 class="product_title entry-title"><a href="books/<?=$book['id']?>"><?=$book['title']?></a></h1>
               <div itemprop="description">
                  <p><?=$book['content']?></p>
               </div>
              <a href="books/<?=$book['id']?>" class="more-link"><span>Купить</span></a>
          </div>
          </div>
          <?php endforeach;?>
      </div>
      <div id="secondary">
         <aside id="recent-posts-2" class="widget widget_recent_entries">
            <h3 class="widget-title"><span>Статьи</span></h3>
            <ul>
               <?php foreach($topArticles as $article):?>
               <li>
                   <a href="/<?=$article['type']?>/<?=$article['id']?>">
                  <?=$article['title'];?>
                  </a>
               </li>
               <?php endforeach;?>
            </ul>
         </aside>
         <aside id="recent-posts-2" class="widget widget_recent_entries">
            <h3 class="widget-title"><span>Программы</span></h3>
            <ul>
               <?php foreach($topPrograms as $postItem):?>
               <li>
                   <a href="/<?=$postItem['type']?>/<?=$postItem['id']?>">
                  <?=$postItem[ 'title'];?>
                  </a>
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
<?include APP. '/views/layouts/footer.php';?>