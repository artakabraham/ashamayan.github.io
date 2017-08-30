<?php foreach($imgListByDate as $image):?>
<div class="col-md-55">
   <div class="thumbnail">
      <div class="image view view-first">
         <img style="width: 100%; display: block;" src="../<?=PATH.$image['path']?>" alt="<?=$image['title']?>">
        <div class="mask no-caption">
            <div class="tools tools-bottom">
               <button class="noborder" onclick="deleteImage(this.id);" id="<?=$image['id']?>"><i class="fa fa-times"></i></button>
            </div>
         </div>
      </div>
      <div class="caption">
         <p><strong><?=$image['title']?></strong></p>
         <p><?=$image['descript']?></p>
      </div>
   </div>
</div>
<?php endforeach;?>