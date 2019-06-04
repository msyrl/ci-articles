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
    <section class="uk-grid-collapse uk-animation-fade" uk-grid>
        <div class="uk-width-expand@s" uk-height-viewport>
            <div class="uk-background-cover uk-height-1-1 uk-panel uk-flex uk-flex-center uk-flex-middle" style="background-image: url(<?= base_url('assets/images/icon/logo.png'); ?>);">
            </div>
        </div>
        <div class="uk-width-1-3@s">
            <div class="uk-flex uk-flex-column uk-flex-between uk-height-1-1">
                <div class="uk-flex uk-flex-column uk-flex-center uk-flex-1">
                    <div>
                        <h2 class="uk-text-center"><?= $site_name; ?></h2>
                    </div>
                    <div class="uk-align-center">
                        <form action="<?= base_url('auth/login'); ?>" method="post" autocomplete="off">
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                                    <input class="uk-input uk-width-medium" type="text" name="username" placeholder="Username..." required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                    <input class="uk-input uk-width-medium" type="password" name="password" placeholder="Password..." required>
                                </div>
                            </div>
                            <?php if ($this->session->flashdata('alert')) : ?>
                                <div class="uk-alert-<?= $this->session->flashdata('alert')['status']; ?> uk-animation-slide-top" uk-alert>
                                    <a class="uk-alert-close" uk-close></a>
                                    <?= $this->session->flashdata('alert')['message']; ?>
                                </div>
                            <?php endif; ?>
                            <div class="uk-margin">
                                <button type="submit" class="uk-button uk-button-default uk-align-center">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div>
                    <h4 class="uk-margin-small-bottom">UNDP INDONESIA COUNTRY OFFICE</h4>
                    <p class="uk-margin-remove-top uk-margin-small-bottom">Copyright © 2019 Innovative Financing Lab. All rights reserved.</p>
                </div>
            </div>
        </div>
    </section>
    <script src="<?= base_url('assets/vendor/uikit/js/uikit.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/uikit/js/uikit-icons.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/jquery/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>
</body>

</html>