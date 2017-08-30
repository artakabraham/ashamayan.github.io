<?php include APP . '/views/layouts/header.php'; ?>
<div id="main" class="clearfix">
    <div class="inner-wrap clearfix">
        <div class="no-sidebar">
            <div id="primary">
                <div id="content" class="clearfix">
                    <article id="post-140" class="post-140 page type-page status-publish hentry">
                        <h2>Регистрация</h2>
                        <? if (isset($error)): ?>
                            <p><?= $error ?></p>
                        <? endif; ?>
                        <form method="post" class="register">			
                            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                <label for="name">Имя<span class="required">*</span></label>
                                <input name="name" type="text" value="<?=@$name?>" class="woocommerce-Input woocommerce-Input--text input-text">
                            </p>
                            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                <label for="email">Эл.почта<span class="required">*</span></label>
                                <input name="email" type="email" value="<?=@$email?>" class="woocommerce-Input woocommerce-Input--text input-text">
                            </p>
                            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                <label for="reEmail">Повторить эл.почту<span class="required">*</span></label>
                                <input name="reEmail" type="email" value="<?=@$reEmail?>" class="woocommerce-Input woocommerce-Input--text input-text">
                            </p>
                            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                <label for="password">Пароль<span class="required">*</span></label>
                                <input name="password" type="password" class="woocommerce-Input woocommerce-Input--text input-text">
                            </p>
                            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                <label for="rePass">Повторить пароль<span class="required">*</span></label>
                                <input name="rePass" type="password" class="woocommerce-Input woocommerce-Input--text input-text">
                            </p>
                            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                <label>Телефон</label>
                                <input name="phone" type="text" value="<?=@$phone?>" class="woocommerce-Input woocommerce-Input--text input-text">
                            </p>
                            <p class="woocomerce-FormRow form-row">
                                <input type="submit" class="woocommerce-Button button" name="register" value="Регистрация">
                            </p>
                        </form>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include APP . '/views/layouts/footer.php'; ?>