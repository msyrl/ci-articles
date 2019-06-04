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
                        <a href="#"><i class="fas fa-globe-asia fa-2x"></i>&nbsp;EN</a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-active"><a href="#">English</a></li>
                                <li><a href="#">Indonesia</a></li>
                            </ul>
                        </div>
                    </li>
                    <?php if ($this->session->userdata('user')) : ?>
                        <li>
                            <a href="<?= base_url('logout'); ?>" onclick="return confirm('Are you sure want to logout?')"><i class="fas fa-sign-out-alt fa-2x"></i>&nbsp;Logout</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
        <div class="uk-margin-medium-top uk-grid-collapse uk-flex-1">
            <div class="uk-grid-collapse uk-height-1-1" uk-grid>
                <div class="uk-card uk-card-default uk-card-body uk-width-medium@s admin-menu">
                    <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
                        <?php if (!empty($data_menus)) : ?>
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
                            <?php foreach ($data_menus as $dm) : ?>
                                <li>
                                    <a href="<?= base_url($dm->url); ?>"><span class="uk-margin-small-right" uk-icon="icon: <?= $dm->icon; ?>"></span> <?= ucwords($dm->title); ?></a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if (!empty($page_menus)) : ?>
                            <li class="uk-nav-divider"></li>
                            <li class="uk-nav-header">Page Management</li>
                            <?php foreach ($page_menus as $pm) : ?>
                                <li>
                                    <a href="<?= base_url($pm->url); ?>"><span class="uk-margin-small-right" uk-icon="icon: <?= $pm->icon; ?>"></span> <?= ucwords($pm->title); ?></a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if (!empty($access_menus)) : ?>
                            <li class="uk-nav-divider"></li>
                            <li class="uk-nav-header">User Management</li>
                            <?php foreach ($access_menus as $am) : ?>
                                <li>
                                    <a href="<?= base_url($am->url); ?>"><span class="uk-margin-small-right" uk-icon="icon: <?= $am->icon; ?>"></span> <?= ucwords($am->title); ?></a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="uk-width-expand uk-padding-small uk-animation-fade">
                    <div class="uk-navbar uk-margin-bottom">
                        <a class="uk-navbar-toggle admin-menu-toggle" href="#" style="min-height: 40px">
                            <span uk-navbar-toggle-icon></span>
                        </a>
                    </div>
                    <?php if ($this->session->flashdata('alert')) : ?>
                        <div class="uk-alert-<?= $this->session->flashdata('alert')['status']; ?> uk-animation-slide-top" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            <?= $this->session->flashdata('alert')['message']; ?>
                        </div>
                    <?php endif; ?>
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
    <script src="<?= base_url('assets/vendor/ckeditor/ckeditor.js'); ?>"></script>
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>
</body>

</html>