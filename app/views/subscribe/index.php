<?php include APP.'/views/layouts/header.php';?>
 <div id="main" class="clearfix">
    <div class="inner-wrap clearfix">
        <div class="u-column2 col-2">
            <h2>ПОДПИСАТЬСЯ</h2>
            <?php if(isset($errors) && is_array($errors)):?>
            <?php for($i = 0; $i < count($errors); $i++){echo "<p>".$errors[$i]."</p>";}?>                    
            <?php endif;?>
            <?php if(isset($success)) { echo $success;} ?>
            <form method="post" class="register">			
                    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                        <label>Имя<span class="required">*</span></label>
                        <input name="name" type="text" class="woocommerce-Input woocommerce-Input--text input-text">
                    </p>
                    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                        <label>Эл.почта<span class="required">*</span></label>
                        <input name="email" type="email" class="woocommerce-Input woocommerce-Input--text input-text">
                    </p>
                    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                        <label for="reg_email">Повторить эл.почту<span class="required">*</span></label>
                        <input name="reEmail" type="email" class="woocommerce-Input woocommerce-Input--text input-text">
                    </p>
                    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                        <label>Телефон</label>
                        <input name="phone" type="text" class="woocommerce-Input woocommerce-Input--text input-text">
                    </p>
                    <p class="woocomerce-FormRow form-row">
                        <input type="submit" class="woocommerce-Button button" name="register" value="Подписаться">
                    </p>
            </form>
	</div>
    </div>    
 </div>
<?php include APP.'/views/layouts/footer.php';?>