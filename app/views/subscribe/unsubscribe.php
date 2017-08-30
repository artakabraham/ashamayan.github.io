<?php include APP. '/views/layouts/header.php';?>
<div id="main" class="clearfix">
    <div class="inner-wrap clearfix">
        <div id="primary">
            <div id="content" class="clearfix">
                <article id="post-239" class="post-239 page type-page status-publish hentry">
                    <header class="entry-header">
                        <h1 class="entry-title">Օтписаться</h1> </header>
                        <?php if(isset($errors) && is_array($errors)):?>
                        <?php for($i = 0; $i < count($errors); $i++){echo "<p>".$errors[$i]."</p>";}?>                    
                        <?php endif;?>
                        <?php if(isset($success)) { echo $success;} ?>
                    <div class="entry-content clearfix">
                        <div class="woocommerce">
                            <form method="post" class="woocommerce-ResetPassword lost_reset_password">
                                <p class="woocommerce-FormRow woocommerce-FormRow--first form-row form-row-first">
                                    <label>Введите эл.почту</label>
                                    <input name="email" class="woocommerce-Input woocommerce-Input--text input-text" type="email" id="user_login" />
                                </p>
                                <div class="clear"></div>
                                <p class="woocommerce-FormRow form-row">
                                    <input name="submit" type="submit" class="woocommerce-Button button" value="Отписаться" />
                                </p>
                            </form>
                        </div>
                    </div>
                </article>
            </div>
            <!-- #content -->
        </div>
        <!-- #primary -->
    </div>
</div>
<?php include APP. '/views/layouts/footer.php';