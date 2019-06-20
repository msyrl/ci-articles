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
    <title><?= $site_name . " | " . $meta_title; ?></title>
</head>

<body>
    <!-- Nav -->
    <nav class="side-nav">
        <div class="uk-grid-small head-content uk-child-width-expand uk-flex-middle" uk-grid>
            <div class="uk-grid-small" uk-grid>
                <div class="uk-width-auto">
                    <button type="button" class="sidebar-toggle">
                        <i class="fas fa-times fa-2x"></i>
                    </button>
                </div>
                <div>
                    <h2 class="uk-heading-small">IFL</h2>
                </div>
            </div>
            <div class="uk-width-1-2 search">
                <div class="uk-width-expand">
                    <form action="<?= base_url('search'); ?>" method="get" autocomplete="off">
                        <div class="uk-inline uk-width-expand">
                            <button type="submit" class="uk-form-icon uk-form-icon-flip" uk-icon="icon: search"></button>
                            <input class="uk-input" type="search" name="q" placeholder="<?= ucfirst($this->lang->line('looking_for_something')); ?>?" value="<?= $this->input->get('q') ?>">
                        </div>
                    </form>
                </div>
            </div>
            <div class="uk-flex uk-flex-middle uk-flex-right auth">
                <ul class="uk-navbar-nav">
                    <li>
                        <a href="#"><i class="fas fa-globe-asia fa-2x"></i>&nbsp;<?= $lang; ?></a>
                        <div uk-dropdown>
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class="<?= $this->session->userdata('lang') === 'english' ? 'uk-active uk-disabled' : ''; ?>"><a href="<?= base_url('set_lang?lang=english'); ?>">English</a></li>
                                <li class="<?= $this->session->userdata('lang') === 'indonesia' ? 'uk-active uk-disabled' : ''; ?>"><a href="<?= base_url('set_lang?lang=indonesia'); ?>">Indonesia</a></li>
                            </ul>
                        </div>
                    </li>
                    <?php if ($this->session->userdata('user')) : ?>
                        <li>
                            <a href="<?= base_url('logout'); ?>" onclick="return confirm('Are you sure want to logout?')"><i class="fas fa-sign-out-alt fa-2x"></i>&nbsp;<?= $this->lang->line('logout'); ?></a>
                        </li>
                    <?php else : ?>
                        <li>
                            <a href="<?= base_url('login'); ?>"><i class="fas fa-user-circle fa-2x"></i>&nbsp;<?= $this->lang->line('login'); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="main-content">
            <ul class="uk-width-medium@s nav-menu">
                <li>
                    <a href="#"><?= $this->lang->line('ifl_window'); ?> <i class="fas fa-chevron-right"></i></a>
                    <div class="menu-list uk-padding">
                        <h3 class="uk-heading-small"><?= $this->lang->line('ifl_window'); ?></h3>
                        <div class="uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid>
                            <?php if (!empty($teams)) : ?>
                                <?php foreach ($teams['data'] as $team) : ?>
                                    <div>
                                        <a href="<?= base_url('window/') . $team->slug; ?>">
                                            <div class="uk-card uk-card-small uk-card-body">
                                                <strong><?= $team->title; ?></strong>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" class="uk-text-capitalize"><?= $this->lang->line('publication'); ?> <i class="fas fa-chevron-right"></i></a>
                    <div class="menu-list uk-padding">
                        <h3 class="uk-heading-small uk-text-capitalize"><?= $this->lang->line('publication'); ?></h3>
                        <div class="uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid>
                            <?php if (!empty($books['data'])) : ?>
                                <?php foreach ($books['data'] as $book) : ?>
                                    <div>
                                        <a href="<?= $book->attachment ? base_url('assets/attachments/books/') . $book->attachment : '#'; ?>">
                                            <div class="uk-card uk-card-small uk-card-body">
                                                <strong><?= $book->title; ?></strong>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if (!empty($brochures['data'])) : ?>
                                <?php foreach ($brochures['data'] as $brochure) : ?>
                                    <div>
                                        <a href="<?= $brochure->attachment ? base_url('assets/attachments/brochures/') . $brochure->attachment : '#'; ?>">
                                            <div class="uk-card uk-card-small uk-card-body">
                                                <strong><?= $brochure->title; ?></strong>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" class="uk-text-capitalize"><?= $this->lang->line('blog'); ?> <i class="fas fa-chevron-right"></i></a>
                    <div class="menu-list uk-padding">
                        <h3 class="uk-heading-small uk-text-capitalize"><?= $this->lang->line('blog'); ?></h3>
                        <div class="uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid>
                            <?php if (!empty($blogs['data'])) : ?>
                                <?php foreach ($blogs['data'] as $blog) : ?>
                                    <div>
                                        <a href="<?= base_url('blog/') . $blog->slug; ?>">
                                            <div class="uk-card uk-card-small uk-card-body">
                                                <strong><?= $blog->title; ?></strong>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="<?= base_url('impactaim'); ?>">Impact Aim <i class="fas fa-chevron-right"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Content Here -->
    <?php $this->load->view($page); ?>

    <!-- Content Here -->

    <!-- Footer -->
    <footer class="uk-background-secondary uk-light">
        <div class="uk-child-width-1-3@m uk-grid-divider uk-padding" uk-grid>
            <?php if (!empty($general)) : ?>
                <div>
                    <h4>UNDP INDONESIA COUNTRY OFFICE</h4>
                    <?= htmlspecialchars_decode($general->address); ?>
                </div>
                <div>
                    <h4>Social Media</h4>
                    <ul>
                        <li>
                            <a href="<?= $general->facebook; ?>"><i class="fab fa-fw fa-facebook"></i> Facebook</a>
                        </li>
                        <li>
                            <a href="<?= $general->youtube; ?>"><i class="fab fa-fw fa-youtube"></i> Youtube</a>
                        </li>
                        <li>
                            <a href="<?= $general->twitter; ?>"><i class="fab fa-fw fa-twitter"></i> Twitter</a>
                        </li>
                        <li>
                            <a href="<?= $general->instagram; ?>"><i class="fab fa-fw fa-instagram"></i> Instagram</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4>Information</h4>
                    <p>
                        Our Team <br />
                        Career <br />
                        Partnership <br />
                    </p>
                </div>
            <?php endif; ?>
        </div>
        <hr class="uk-margin-remove" />
        <p class="uk-margin-remove uk-padding-small">
            Copyright © 2019 Innovative Financing Lab. All rights reserved.
        </p>
    </footer>
    <!-- Footer -->

    <script src="<?= base_url('assets/vendor/uikit/js/uikit.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/uikit/js/uikit-icons.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/jquery/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>
</body>

</html>