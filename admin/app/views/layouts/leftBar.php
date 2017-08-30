<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title">
            <a href="/admin" class="site_title"><i class="fa fa-paw"></i> <span>Asha Mayan</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="<?= PATH ?>images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome</span>
                <h2><?= $this->user['name']; ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">                    
                    <? if(Options::getPermission($this->user['id'], 'page')): ?>
                    <li>
                        <a><i class="fa fa-clone"></i>Pages<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">        
                            <? if(Options::getPermission($this->user['id'], 'new')): ?>
                            <li><div onclick="postNew()">New</div></li>
                            <? endif; ?>
                            <? foreach($this->menuItems as $item): ?>
                            <li><div onclick="loadGrid('<?= $item['slug'] ?>')"><?= $item['name'] ?></div></li>
                            <? endforeach; ?>
                            <? if (Options::getPermission($this->user['id'],'trash')): ?>
                            <li><div onclick="loadTrash()">Trash</div></li>
                            <? endif; ?>
                        </ul>
                    </li>
                    <? endif; ?>
                    <? if(Options::getPermission($this->user['id'], 'media')): ?>
                    <li>
                        <a><i class="fa fa-camera-retro"></i>Media<span class="fa fa-chevron-down"></span></a>                    
                        <ul class="nav child_menu">
                            <li><div onclick="loadGallery()">Gallery</div></li>                            
                            <li><div onclick="upload()">Upload</div></li>
                        </ul>
                    </li>
                    <? endif; ?>
                    <? if(Options::getPermission($this->user['id'], 'slider')): ?>
                    <li>
                        <a><i class="fa fa-picture-o"></i>Sliders <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><div onclick="loadSlider()">Main Slider</div></li>
                        </ul>
                    </li>
                    <? endif; ?>
                    <? if(Options::getPermission($this->user['id'], 'service')): ?>
                    <li>
                        <a><i class="fa fa-users"></i>Users<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><div onclick="getUsers()">Users</div></li>
                            <li><div onclick="getSubscribers()">Subscribers</div></li>
                            <li><div onclick="getUnsubscribed()">Unsubscribed</div></li>
                            <li><div onclick="getMessages()">Mail</div></li>
                            <li><div onclick="getMailing()">Mailing</div></li>                            
                        </ul>
                    </li>
                    <? endif; ?>
                    <? if(Options::getPermission($this->user['id'], 'service')): ?>
                    <li>
                        <a><i class="fa fa-calendar"></i>Service<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?=PATH ?>service">Calendar</a></li>
                        </ul>
                    </li>
                    <? endif; ?>
                    <? if(Options::getPermission($this->user['id'], 'menu')): ?>
                    <li>
                        <a><i class="fa fa-th-list"></i>Menu<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><div onclick="getMenu()">Menu</div></li>
                        </ul>
                    </li>
                    <? endif; ?>
                </ul>
            </div>
        </div>
        <!-- Sidebar menu -->
        <!-- menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <div onClick="userSettings()" data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </div>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a href="<?= PATH ?>user/logout" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>