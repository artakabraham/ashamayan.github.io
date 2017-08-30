<?include APP. '/views/layouts/header.php'?>
<div id="main" class="clearfix">
   <div class="inner-wrap clearfix">
      <div id="primary">
         <div id="content" class="clearfix">

             <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;height=600&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=artakabraham%40gmail.com&amp;color=%232952A3&amp;ctz=Asia%2FYerevan" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
             
             
         </div>
      </div>
      <div id="secondary">
         <aside id="recent-posts-2" class="widget widget_recent_entries">
            <h3 class="widget-title"><span><?=$topArticles[0]['type']?></span></h3>
            <ul>
               <?php foreach($topArticles as $article):?>
               <li>
                  <a href="/articles/<?=$article['id']?>">
                  <?=$article[ 'title'];?>
                  </a>
               </li>
               <?php endforeach;?>
            </ul>
         </aside>
         <aside id="recent-posts-2" class="widget widget_recent_entries">
            <h3 class="widget-title"><span><?=$topPrograms[0]['type']?></span></h3>
            <ul>
               <?php foreach($topPrograms as $postItem):?>
               <li>
                  <a href="/articles/<?=$postItem['id']?>">
                  <?=$postItem[ 'title'];?>
                  </a>
               </li>
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
<?include APP. '/views/layouts/footer.php';?>