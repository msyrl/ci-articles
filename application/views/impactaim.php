<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $site_name . " | " . $meta_title; ?></title>
    <link rel="shortcut icon" href="<?= base_url('assets/images/icon/logo.png'); ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/uikit/css/uikit.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome/css/all.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/impactaim/css/style.css'); ?>">
</head>

<body>
    <div class="uk-position-fixed uk-position-z-index uk-position-top-left">
        <a href="<?= base_url('/'); ?>" class="uk-button button-back"><i class="fas fa-chevron-left"></i> back</a>
    </div>
    <div uk-scrollspy="cls: uk-animation-fade; target: > *; delay: 300; repeat: true" style="width: 100%; height: 100%;">
        <img src="<?= base_url('assets/impactaim/1.png'); ?>" width="100%" uk-img>
        <img src="<?= base_url('assets/impactaim/2.png'); ?>" width="100%" uk-img>
        <img src="<?= base_url('assets/impactaim/3.png'); ?>" width="100%" uk-img>
        <img src="<?= base_url('assets/impactaim/4.png'); ?>" width="100%" uk-img>
        <div class="uk-position-relative">
            <img src="<?= base_url('assets/impactaim/5.png'); ?>" width="100%" uk-img>
            <div class="uk-position-absolute" style="top: 72%; left: 45%;">
                <a href="<?= base_url('/impactaim_form'); ?>" class="uk-button uk-button-primary" style="border: 1px solid #fff; border-radius: 5px;">APPLY Form</a>
            </div>
        </div>
        <section class="uk-margin-medium-top uk-margin-medium-bottom">
            <h2 class="uk-heading-line uk-margin-auto uk-text-center uk-text-bold uk-width-2-3"><span>Collaborating Partners</span></h2>
            <div class="uk-flex uk-flex-around uk-width-2-3 uk-margin-auto">
                <div class="uk-background-contain uk-width-small uk-height-small" data-src="<?= base_url('assets/impactaim/logo_500.svg'); ?>" uk-svg></div>
                <div class="uk-background-contain uk-width-small uk-height-small" data-src="<?= base_url('assets/impactaim/logo_bukalapak.svg'); ?>" uk-svg></div>
                <div class="uk-background-contain uk-width-small uk-height-small" data-src="<?= base_url('assets/impactaim/logo_undp.svg'); ?>" uk-svg></div>
                <div class="uk-background-contain uk-width-small uk-height-small" data-src="<?= base_url('assets/impactaim/logo_impact_aim.svg'); ?>" uk-svg></div>
            </div>
        </section>
    </div>
    <script src="<?= base_url('assets/vendor/uikit/js/uikit.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/uikit/js/uikit-icons.min.js') ?>"></script>
</body>

</html>