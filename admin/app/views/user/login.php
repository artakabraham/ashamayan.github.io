<?php require_once APP . '/views/layouts/head.php'; ?>
<body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="post">
                        <h1>Login</h1>
                        <div>
                            <? if (isset($errors) && is_array($errors)): ?>
                                <? foreach ($errors as $error): ?>
                                    <p><?= $error; ?></p>
                                <? endforeach; ?>
                            <? endif; ?>
                        </div>    
                        <div>
                            <input name="login" type="text" class="form-control" placeholder="Username"  />
                        </div>
                        <div>
                            <input name="password" type="password" class="form-control" placeholder="Password" />
                        </div>
                        <div>
                            <input name="submit" class="btn btn-default submit" type="submit" value="Log in" />
                            <a class="reset_pass" href="#">Lost your password?</a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1></i>Asha Mayan</h1>
                                <p>©2016 - <?= date("Y") ?> All Rights Reserved</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
