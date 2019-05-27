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
    <!-- Content Here -->
    <?php $this->load->view($page); ?>

    <!-- Content Here -->

    <!-- Footer -->
    <footer class="uk-background-secondary uk-light">
        <div class="uk-child-width-1-3@m uk-grid-divider uk-padding" uk-grid>
            <div>
                <h4 class="uk-">UNDP INDONESIA COUNTRY OFFICE</h4>
                <p>
                    Menara Thamrin 8-9th Floor <br />
                    Jl. MH Thamrin Kav. 3 <br />
                    Jakarta 10250 <br />
                    Phone: +62-21-29802300 <br />
                    Fax: +62-21-39838941 <br />
                </p>
            </div>
            <div>
                <h4>Social Media</h4>
                <ul>
                    <li>
                        <a href="#"><i class="fab fa-fw fa-facebook"></i> Facebook</a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-fw fa-youtube"></i> Youtube</a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-fw fa-twitter"></i> Twitter</a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-fw fa-instagram"></i> Instagram</a>
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
    <!-- Extra Script -->
    <?php if (isset($meta_script)) : ?>
        <script src="<?= base_url($meta_script); ?>"></script>
    <?php endif; ?>
    <!-- Extra Script -->
</body>

</html>