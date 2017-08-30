<?php include APP . '/views/layouts/header.php'; ?>
<div id="main" class="clearfix">
    <div class="inner-wrap clearfix">
        <div class="no-sidebar">
            <div id="primary">
                <div id="content" class="clearfix">
                    <article id="post-140" class="post-140 page type-page status-publish hentry">  
                        <h2>Вход</h2>
                        <? if (isset($error)):?> 
                        <p><?= $error ?></p>                    
                        <? endif; ?>
                        <div>
                            <form method="post" class="register">			
                                <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                    <label>Логин<span class="required">*</span></label>
                                    <input name="login" type="text" class="woocommerce-Input woocommerce-Input--text input-text">
                                </p>
                                <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                    <label>Пароль<span class="required">*</span></label>
                                    <input name="password" type="password" class="woocommerce-Input woocommerce-Input--text input-text">
                                </p>
                                <p class="woocomerce-FormRow form-row">
                                    <input type="submit" class="woocommerce-Button button" name="submit" value="Вход">
                                </p>
                            </form>
                            <div>
                            </div>
                        </div>        
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include APP . '/views/layouts/footer.php'; ?>