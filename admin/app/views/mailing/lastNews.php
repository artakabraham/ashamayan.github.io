<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="clearfix"></div>
            <div class="x_title">
                <?if(isset($error)) echo $error;?>
                <?if(isset($success)) echo $success;?>
                <div class="clearfix"></div>
            </div>
            <textarea name="editor1" id="editor1" disabled>
            <div style="margin: 0 auto; max-width:900px; display: block;">   
            <div style="height: 350px;float: left;">
            <div style="width:270px; float:left; margin-right:20px;">
                <h2><a href="articles"><?=ucfirst($lastArticles[0]['type'])?></a></h2>
                <div><a href="articles/142"><img alt="fdsfsd" src="<?= Posts::getImage($lastArticles[0]['id']); ?>" style="height:150px; width:270px" /></a></div>
                <ul>
                    <? foreach($lastArticles as $article):?>
                    <li><a href="<?=$article['type']?>/<?=$article['id']?>"><?=$article['title']?>d</a></li>
                    <? endforeach; ?>
                </ul>
            </div>
            <div style="width:270px; float:left; margin-right:20px;">
                <h2><a href="articles"><?=ucfirst($lastBlog[0]['type'])?></a></h2>
                <div><a href="articles/142"><img alt="fdsfsd" src="<?= Posts::getImage($lastBlog[0]['id']); ?>" style="height:150px; width:270px" /></a></div>
                <ul>
                    <? foreach($lastBlog as $blog):?>
                    <li><a href="<?=$blog['type']?>/<?=$blog['id']?>"><?=$blog['title']?>d</a></li>
                    <? endforeach; ?>
                </ul>
            </div>
            <div style="width:270px; float:left; margin-right:20px;">
                <h2><a href="articles"><?=ucfirst($teenagers[0]['type'])?></a></h2>
                <div><a href="articles/142"><img alt="fdsfsd" src="<?= Posts::getImage($teenagers[0]['id']); ?>" style="height:150px; width:270px" /></a></div>
                <ul>
                    <? foreach($teenagers as $teenager):?>
                    <li><a href="<?=$teenager['type']?>/<?=$teenager['id']?>"><?=$teenager['title']?>d</a></li>
                    <? endforeach; ?>
                </ul>
            </div>  
            </div>
            <div style="width:270px; float:left; margin-right:20px;">
                <h2><a href="articles"><?=ucfirst($announcements[0]['type'])?></a></h2>
                <div><a href="articles/142"><img alt="fdsfsd" src="<?= Posts::getImage($announcements[0]['id']); ?>" style="height:150px; width:270px" /></a></div>
                <ul>
                    <? foreach($announcements as $announcement):?>
                    <li><a href="<?=$announcement['type']?>/<?=$announcement['id']?>"><?=$announcement['title']?>d</a></li>
                    <? endforeach; ?>
                </ul>
            </div>   
            </textarea>
            <br />
            <div class="ln_solid"></div>
            <button onclick="sendNews()" name="submit" value="Add" class="btn btn-primary">Send</button>
        </div>
    </div>
</div>