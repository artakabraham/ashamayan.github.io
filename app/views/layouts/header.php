<!DOCTYPE html>
<html>
    <head>
        <!--[if IE]><![endif]-->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Slab%3A700%2C400%7CRoboto%3A400%2C300%2C100" />
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Среда для саморазвития</title>
        <link rel='stylesheet' href='<?= PATH ?>css/main.css' type='text/css' />
        <link rel='stylesheet' id='contact-form-7-css' href='/css/styles11b8.css' type='text/css' media='all' />
        <link rel='stylesheet' id='woocommerce-layout-css' href='/css/woocommerce-layout72e6.css' type='text/css' media='all' />
        <link rel='stylesheet' id='woocommerce-smallscreen-css' href='/css/woocommerce-smallscreen72e6.css' type='text/css' media='only screen and (max-width: 768px)' />
        <link rel='stylesheet' id='woocommerce-general-css' href='/css/woocommerce72e6.css' type='text/css' media='all' />
        <link rel='stylesheet' id='accelerate_style-css' href='/css/style4711.css' type='text/css' media='all' />
        <link rel='stylesheet' id='accelerate-fontawesome-css' href='/css/font-awesome.min474a.css' type='text/css' media='all' />
        <link rel='stylesheet' id='jetpack_css-css' href='/css/jetpack5b31.css' type='text/css' media='all' />

        <script type='text/javascript' src='<?= PATH ?>js/jqueryb8ff.js'></script>
        <script type='text/javascript' src='<?= PATH ?>js/jquery-migrate.min330a.js'></script>
        <script type='text/javascript' src='<?= PATH ?>js/accelerate-custom.min4711.js'></script>

        <link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc0db0.php?rsd" />
        <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="wp-includes/wlwmanifest.xml" />
        <link rel="alternate" type="application/json+oembed" href="wp-json/oembed/1.0/embed8ff9.json?url=http%3A%2F%2Fdemo.themegrill.com%2Faccelerate-pro%2F" />
        <link rel="alternate" type="text/xml+oembed" href="wp-json/oembed/1.0/embed82f6?url=http%3A%2F%2Fdemo.themegrill.com%2Faccelerate-pro%2F&amp;format=xml" />    
        <script data-no-minify="1">
            (function (w, d) {
                function a() {
                    var b = d.createElement("script");
                    b.async = !0;
                    b.src = "<?= PATH ?>js/lazyload.1.0.2.min.js";
                    var a = d.getElementsByTagName("script")[0];
                    a.parentNode.insertBefore(b, a)
                }
                w.attachEvent ? w.attachEvent("onload", a) : w.addEventListener("load", a, !1)
            })(window, document);
        </script>
    </head>

    <body class="home page page-id-9 page-template page-template-page-templates page-template-business page-template-page-templatesbusiness-php  wide">
        <!-- fb comments -->

        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=221174671376942";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <!-- end of FB comments -->
        <div id="page" class="hfeed site">
            <header id="masthead" class="site-header clearfix">       
                <div id="header-text-nav-container" class="clearfix">
                    <div class="inner-wrap">
                        <div id="header-text-nav-wrap" class="clearfix">
                            <div id="header-left-section">
                                <div id="header-logo-image">
                                    <a href="/" title="Asha Mayan" rel="home"><img src="https://www.ashamayan.com/public/images/logo-acce.png" alt="Asha Mayan"></a>
                                </div>
                                <div id="header-text" class="">
                                    <h1 id="site-title"><a href="/" title="Asha Mayan" rel="home">Asha Mayan</a></h1>
                                    <p id="site-description">Среда для саморазвития</p>
                                </div>
                            </div>
                            <div id="header-right-section">
                                <div id="header-right-sidebar" class="clearfix">
                                    <aside id="search-3" class="widget widget_search">
                                        <form id="search-form" class="searchform clearfix" method="post">
                                            <input type="text" placeholder="найти" class="s field" name="s">
                                            <input type="submit" value="Пойск" id="search-submit" name="submit" class="submit">
                                        </form>
                                    </aside>
                                    <aside id="bcn_widget-2" class="widget widget_breadcrumb_navxt">
                                        <div class="breadcrumbs">
                                            <?if(isset($_SESSION['user'])):?>
                                            <a title="Вход" href="logout">Выход</a>
                                            <?else:?>
                                            <a title="Подписатся" href="register" class="main-home">Регистрация/</a>
                                            <a title="Вход" href="login">Вход</a>
                                            <?endif;?>
                                        </div>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav id="site-navigation" class="main-navigation inner-wrap clearfix">
                        <h3 class="menu-toggle">Menu</h3>
                        <div class="menu-primary-container inner-wrap">
                            <ul class="menu">                            
                                <?php foreach ($this->menuItems as $item): ?>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-199"><a href="<?= PATH . $item['descript'] ?>"><?= $item['title'] ?></a>
                                        <ul class="sub-menu">
                                            <?php foreach (Articles::getSubMenu($item['id']) as $submenu): ?>                                
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children">
                                                    <a href="<?= PATH . $submenu['type'] . '/' . $submenu['id'] ?>"><?= $submenu['title'] ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>