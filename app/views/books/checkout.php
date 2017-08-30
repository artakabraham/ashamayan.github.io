<?php include APP . '/views/layouts/header.php'; ?>
<div id="main" class="clearfix">
    <div class="inner-wrap clearfix">
        <form method="post" class="checkout woocommerce-checkout" action="https://money.yandex.ru/quickpay/confirm.xml" enctype="multipart/form-data">
            <div id="primary">
                <div class="col2-set" id="customer_details">
                    <div class="col-1">
                        <div class="woocommerce-billing-fields">
                            <p class="form-row form-row form-row-first validate-required" id="billing_first_name_field">
                                <label>Имя:</label>
                            <p class="input-text"><?= $options['name'] ?></p>
                            </p>
                            <p class="form-row form-row form-row-first validate-required validate-email" id="billing_email_field">
                                <label>Эл.почта:</label>
                            <p class="input-text"><?= $options['email'] ?></p>
                            </p>
                            <p class="form-row form-row form-row-first validate-required validate-email" id="billing_email_field">
                                <label>Способ оплаты:</label>
                            <p class="input-text">Яндекс деньги</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="secondary">
                <h3 id="order_review_heading">Ваш заказ</h3>
                <div id="order_review" class="woocommerce-checkout-review-order">
                    <table class="shop_table woocommerce-checkout-review-order-table">
                        <thead>
                            <tr>
                                <th class="product-name">Имя</th>
                                <th class="product-total">Цена</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="cart_item">
                                <td class="product-name"><?= $options['title'] ?></td>
                                <td class="product-total">
                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#8381; &nbsp;</span><?= $options['price'] ?></span>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="order-total">
                                <th>Всего</th>
                                <td><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#8381; &nbsp;</span><?= $options['price'] ?></span></strong></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div id="payment" class="woocommerce-checkout-payment">
                        <ul class="wc_payment_methods payment_methods methods">
                            <li class="wc_payment_method payment_method_cheque">
                                <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque" checked="checked" data-order_button_text="">
                                <label for="payment_method_cheque">Способ оплаты</label>
                                <div class="payment_box payment_method_cheque">
                                    <img src="/images/yandex_money.png" alt="yandex_money" width="150">
                                </div>
                            </li>
                        </ul>
                        <div class="form-row place-order">
                            <input type="hidden" name="receiver" value="410013178220709">
                            <input type="hidden" name="formcomment" value="<?= $options['title'] ?>"> 
                            <input type="hidden" name="short-dest" value="<?= $options['title'] ?>"> 
                            <input type="hidden" name="label" value="<?= $options['id'].','.$options['user'];?>"> 
                            <input type="hidden" name="quickpay-form" value="shop"> 
                            <input type="hidden" name="targets" value="<?=$options['title'] ?>"> 
                            <input type="hidden" name="sum" value="<?= $options['price'] ?>" data-type="number">
                            <input type="hidden" name="comment" value="<?= $options['title'] ?>">
                            <input type="hidden" name="need-fio" value="false"> 
                            <input type="hidden" name="need-email" value="false"> 
                            <input type="hidden" name="need-phone" value="false"> 
                            <input type="hidden" name="need-address" value="false"> 
                            <input type="hidden" name="paymentType" value="PC">
                            <input type="hidden" name="successURL" value="https://ashamayan.com/login">
                            <input type="submit" class="button alt" name="woocommerce_checkout_place_order" value="Заплатить">	
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?include APP. '/views/layouts/footer.php'?>