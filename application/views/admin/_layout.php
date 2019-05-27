<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href="<?= base_url('assets/images/icon/logo.png'); ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/uikit/css/uikit.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome/css/all.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/font.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>" />
    <title><?= $site_name . $meta_title; ?></title>
</head>

<body>
    <div class="uk-flex uk-flex-column uk-height-1-1">
        <nav class="top-nav uk-background-secondary uk-text-primary uk-position-fixed uk-position-top uk-position-z-index uk-navbar-container uk-navbar-transparent" uk-navbar>
            <div class="uk-navbar-left">
                <p>IFL <span class="ext-title">| Blog</span></p>
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    <li>
                        <a href="#"><i class="fas fa-user-circle fa-2x"></i>&nbsp;Login</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-globe-asia fa-2x"></i>&nbsp;EN</a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-active"><a href="#">English</a></li>
                                <li><a href="#">Indonesia</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="uk-margin-medium-top uk-grid-collapse uk-flex-1">
            <div class="uk-grid-collapse uk-height-1-1" uk-grid>
                <div class="uk-card uk-card-default uk-card-body uk-width-medium@s admin-menu">
                    <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
                        <li class="uk-nav-header">
                            <div class="uk-flex uk-flex-middle uk-flex-between">
                                <div>
                                    Data Management
                                </div>
                                <div class="mobile-admin-menu-toggle">
                                    <a class="uk-navbar-toggle admin-menu-toggle" href="#" style="min-height: 40px">
                                        <span uk-navbar-toggle-icon></span>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/blog'); ?>"><span class="uk-margin-small-right" uk-icon="icon: file-text"></span> Blogs</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/book'); ?>"><span class="uk-margin-small-right" uk-icon="icon: folder"></span> Books</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/brochure'); ?>"><span class="uk-margin-small-right" uk-icon="icon: image"></span> Brochures</a>
                        </li>
                        <li>
                            <a href="#"><span class="uk-margin-small-right" uk-icon="icon: play-circle"></span> Videos</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/team'); ?>"><span class="uk-margin-small-right" uk-icon="icon: users"></span> Teams</a>
                        </li>
                        <li>
                            <a href="#"><span class="uk-margin-small-right" uk-icon="icon: social"></span> Experts</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/connect'); ?>"><span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span> Connects</a>
                        </li>
                        <li class="uk-nav-divider"></li>
                        <li class="uk-nav-header">Page Management</li>
                        <li>
                            <a href="<?= base_url('admin/slide'); ?>"><span class="uk-margin-small-right" uk-icon="icon: image"></span> Slides</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/about'); ?>"><span class="uk-margin-small-right" uk-icon="icon: info"></span> About</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/general'); ?>"><span class="uk-margin-small-right" uk-icon="icon: receiver"></span> Generals</a>
                        </li>
                        <li class="uk-nav-divider"></li>
                        <li class="uk-nav-header">User Management</li>
                        <li>
                            <a href="#"><span class="uk-margin-small-right" uk-icon="icon: link"></span> Roles</a>
                        </li>
                        <li>
                            <a href="#"><span class="uk-margin-small-right" uk-icon="icon: user"></span> Users</a>
                        </li>
                    </ul>
                </div>
                <div class="uk-width-expand uk-padding-small uk-animation-fade">
                    <div class="uk-navbar uk-margin-bottom">
                        <a class="uk-navbar-toggle admin-menu-toggle" href="#" style="min-height: 40px">
                            <span uk-navbar-toggle-icon></span>
                        </a>
                    </div>
                    <!-- Content Here -->
                    <?php $this->load->view($page); ?>
                    <!-- Content Here -->
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/vendor/uikit/js/uikit.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/uikit/js/uikit-icons.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/jquery/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>
    <!-- Extra Script -->
    <?php if (isset($meta_script)) : ?>
        <script src="<?= base_url($meta_script); ?>"></script>
    <?php endif; ?>
    <!-- Extra Script -->
</body>

</html>