<?php include APP. '/views/layouts/header.php';?>
<div id="main" class="clearfix">
<div class="inner-wrap clearfix">
   <div id="primary_two">
      <div id="content" class="clearfix">
         <div class="images">
            <img width="530" height="530" src="<?=Articles::getImage($book['id'],'book')?>" class="attachment-shop_single size-shop_single wp-post-image" alt="<?=$book['title']?>" title="<?=$book['title']?>"/>
         </div>
      </div>
   </div>
   <div id="secondary_two">
      <div class="summary entry-summary">
         <h1 class="product_title entry-title"><?=$book['title']?></h1>
         <div>
            <p class="price">
               <span class="woocommerce-Price-amount amount">&#8381; &nbsp;<?=$price['meta_value']?></span>
            </p>
         </div>
         <div><?=$book['content']?></div>
         <form action="<?=PATH?>checkout/<?=$book['id']?>" class="cart" method="post" enctype='multipart/form-data'>
            <div class="quantity"> 						<div class="col2-set" id="customer_details">               <div class="col-1">                  <div class="woocommerce-billing-fields">                     <p class="form-row form-row form-row-first validate-required" id="billing_first_name_field">                        <label for="name" class="">Имя<abbr class="required" title="required">*</abbr></label>                        <input type="text" class="input-text" name="name" autocomplete="given-name" required>                     </p>                     <p class="form-row form-row form-row-first validate-required validate-email">                        <label for="email">Эл.почта<abbr class="required" title="required">*</abbr></label>                        <input type="email" class="input-text " name="email" autocomplete="email" required>                     </p>                  </div>               </div>            </div>
            </div>			<input type="hidden" name="title" value="<?=$book['title']?>">			<input type="hidden" name="id" value="<?=$book['id']?>">			<input type="hidden" name="price" value="<?=$price['meta_value']?>">
            <button type="submit" name="submit" class="single_add_to_cart_button button alt">Купить</button>        </form>
      </div>	</div>
   </div>
</div><?include APP. '/views/layouts/footer.php'?>