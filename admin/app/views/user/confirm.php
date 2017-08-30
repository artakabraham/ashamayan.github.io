<?php require_once APP . '/views/layouts/head.php'; ?>
<body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="post">
                        <h1>Set password</h1>
                        <div>
                            <? if(isset($error)) echo "<p>".$error."</p>" ?>
                            <? if(isset($success)) echo '<p>'.$success.'</p>';?>
                        </div>    
                        <div>
                            <input name="password" type="password" class="form-control" placeholder="password"  />
                        </div>
                        <div>
                            <input name="rePassword" type="password" class="form-control" placeholder="repeat password"  />
                        </div>
                        <div>
                            <input name="submit" class="btn btn-default submit" type="submit" value="Submit" />
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1>Asha Mayan</h1>
                                <p>©2016-<?=date("Y")?> All Rights Reserved</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
