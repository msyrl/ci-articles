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
    <section class="uk-height-1-1 uk-position-relative uk-background-cover uk-flex uk-flex-column uk-flex-center uk-flex-middle" style="background-image: url(<?= base_url('assets/impactaim/showcase_1.png'); ?>)">
        <h3 class="uk-text-center uk-margin-remove text-gray small-heading spacing-5">IMPACT AIM INDONESIA IS HAVING</h3>
        <h1 class="uk-text-bold uk-text-center uk-text-truncate uk-margin-remove text-white" style="font-size: 7rem">CALL FOR<br>APPLICATIONS
        </h1>
        <div class="uk-position-bottom-right uk-margin-medium-right uk-margin-medium-bottom small-heading spacing-5">
            <h3 class="uk-text-right uk-margin-remove text-gray">APPLY TO</h3>
            <h3 class="uk-text-right uk-margin-remove text-gray">DEADLINE: XX JULY 2019</h3>
        </div>
    </section>
    <section class="uk-height-1-1 uk-background-cover uk-padding" style="background-image: url(<?= base_url('assets/impactaim/showcase_2.png'); ?>)">
        <h1 class="uk-text-bold uk-text-left uk-margin-xlarge-bottom text-white" uk-scrollspy="cls: uk-animation-scale-up; repeat: true">Why ImpactAim<br>Indonesia?</h1>
        <div class="uk-grid-large uk-child-width-1-3@m" uk-grid uk-scrollspy="cls: uk-animation-fade; target: > div; delay: 300; repeat: true">
            <div>
                <h2 class="uk-margin-small-left small-heading text-white spacing-1-5">ACCELERATION CURICULUM</h2>
                <h2 class="text-white small-heading">ImpactAim will provide a designed curriculum to solidify market base and scale up impact</h2>
            </div>
            <div>
                <h2 class="uk-margin-small-left small-heading text-white spacing-1-5">MENTORSHIP</h2>
                <h2 class="text-white small-heading">ImpactAim will provide individualized mentorship programs and organized bootcamps</h2>
            </div>
            <div>
                <h2 class="uk-margin-small-left small-heading text-white spacing-1-5">FUNDING ACCESS</h2>
                <h2 class="text-white small-heading">By joining ImpactAim participants get to access selected impact ventures for their startups</h2>
            </div>
        </div>
    </section>
    <section class="uk-height-1-1 uk-background-cover uk-grid-collapse uk-child-width-1-2@m uk-padding" style="background-image: url(<?= base_url('assets/impactaim/showcase_3.png'); ?>)" uk-grid>
        <div class="uk-flex uk-flex-center uk-flex-column uk-margin-top uk-margin-bottom" uk-scrollspy="cls: uk-animation-scale-up; repeat: true">
            <h1 class="uk-text-bold uk-text-truncate uk-margin-remove-vertical uk-margin-large-left text-white" style="font-size: 5rem">SELECTION</h1>
            <h2 class="uk-text-bold uk-text-truncate uk-margin-remove-vertical uk-margin-large-left text-white" style="font-size: 3rem">CRITERIA</h2>
        </div>
        <div class="uk-flex uk-flex-around uk-flex-column uk-margin-top uk-margin-bottom" uk-scrollspy="cls: uk-animation-slide-bottom; target: > div; delay: 300; repeat: true">
            <div class="uk-grid-collapse uk-child-width-expand@m" uk-grid>
                <div class="uk-width-auto@m uk-flex uk-flex-center">
                    <img src="<?= base_url('assets/impactaim/logo_3_1.svg'); ?>" width="100" height="100" uk-svg>
                </div>
                <h3 class="uk-flex uk-flex-middle uk-padding-small text-white small-heading">Address social and environmental problems with proven and scalable business model</h3>
            </div>
            <div class="uk-grid-collapse uk-child-width-expand@m" uk-grid>
                <div class="uk-width-auto@m uk-flex uk-flex-center">
                    <img class="uk-margin-medium-left" src="<?= base_url('assets/impactaim/logo_3_2.svg'); ?>" width="100" height="100" uk-svg>
                </div>
                <h3 class="uk-flex uk-flex-middle uk-padding-small text-white small-heading">Empower people and achieve multiplier effect</h3>
            </div>
            <div class="uk-grid-collapse uk-child-width-expand@m" uk-grid>
                <div class="uk-width-auto@m uk-flex uk-flex-center">
                    <img class="uk-margin-medium-left" src="<?= base_url('assets/impactaim/logo_3_3.svg'); ?>" width="100" height="100" uk-svg>
                </div>
                <h3 class="uk-flex uk-flex-middle uk-padding-small text-white small-heading">Have identifiable beneficiaries</h3>
            </div>
            <div class="uk-grid-collapse uk-child-width-expand@m" uk-grid>
                <div class="uk-width-auto@m uk-flex uk-flex-center">
                    <img src="<?= base_url('assets/impactaim/logo_3_4.svg'); ?>" width="100" height="100" uk-svg>
                </div>
                <h3 class="uk-flex uk-flex-middle uk-padding-small text-white small-heading">Have formed teams, proven economic feasibility, prove market, and emerging market base</h3>
            </div>
        </div>
    </section>
    <section class="uk-position-relative uk-height-1-1 uk-background-cover uk-padding" style="background-image: url(<?= base_url('assets/impactaim/showcase_4.png'); ?>)" uk-scrollspy="cls: uk-animation-fade; target: > *; delay: 300; repeat: true">
        <h1 class="uk-flex uk-flex-center uk-text-bold custom-header spacing-1-5" style="font-size: 3rem">Did you know?</h1>
        <h3 class="uk-text-center text-white small-heading spacing-1-5 custom-title" style="width: 45%; margin: auto">micro and small medium enterprise are a key driving force of Indonesia's economy</h3>
        <div class="uk-flex uk-flex-center uk-grid-collapse uk-child-width-auto@m" uk-grid>
            <div class="uk-width-large uk-flex uk-flex-column uk-flex-middle uk-padding-small">
                <img src="<?= base_url('assets/impactaim/logo_4_1.svg'); ?>" width="200" height="200" uk-svg>
                <h3 class="uk-text-center text-white small-heading spacing-1-5">of all Indonesia businesses are micro and small medium enterprise</h3>
            </div>
            <div class="uk-width-large uk-flex uk-flex-column uk-flex-middle uk-padding-small">
                <img src="<?= base_url('assets/impactaim/logo_4_2.svg'); ?>" width="200" height="200" uk-svg>
                <h3 class="uk-text-center text-white small-heading spacing-1-5">of GDP are contribution of micro and small medium enterprise</h3>
            </div>
        </div>
        <div class="uk-position-bottom-right uk-margin-small-right uk-margin-small-bottom">
            <h3 class="text-white uk-margin-remove">source:</h3>
            <h3 class="text-white small-heading uk-margin-remove">Asian Development Outlook</h3>
        </div>
    </section>
    <section class="uk-height-1-1 uk-background-cover uk-padding" style="background-image: url(<?= base_url('assets/impactaim/showcase_5.png'); ?>)" uk-scrollspy="cls: uk-animation-fade; target: > *; delay: 300; repeat: true">
        <h1 class="uk-flex uk-flex-center uk-text-bold custom-header" style="font-size: 2.5rem">What's ImpactAim?</h1>
        <h3 class="uk-text-center text-white small-heading spacing-1-5" style="width: 70%; margin: auto">an accelerator that aim to help Indonesia in achieving Sustainable Development Goals (SDG) by amplifying positive impact of local startups.</h3>
        <div class="uk-flex uk-flex-center uk-grid-collapse uk-child-width-1-3@m" uk-grid>
            <div class="uk-flex uk-flex-column uk-flex-middle uk-padding-small">
                <img src="<?= base_url('assets/impactaim/logo_5_1.svg'); ?>" width="200" height="200" uk-svg>
                <h3 class="uk-width-medium uk-text-center text-white small-heading spacing-1-5">business development guidance</h3>
            </div>
            <div class="uk-flex uk-flex-column uk-flex-middle uk-padding-small">
                <img src="<?= base_url('assets/impactaim/logo_5_2.svg'); ?>" width="200" height="200" uk-svg>
                <h3 class="uk-width-medium uk-text-center text-white small-heading spacing-1-5">global access facilitation through UNDP channels</h3>
            </div>
            <div class="uk-flex uk-flex-column uk-flex-middle uk-padding-small">
                <img src="<?= base_url('assets/impactaim/logo_5_3.svg'); ?>" width="200" height="200" uk-svg>
                <h3 class="uk-width-medium uk-text-center text-white small-heading spacing-1-5">funding access facilitation</h3>
            </div>
        </div>
    </section>

    <script src="<?= base_url('assets/vendor/uikit/js/uikit.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/uikit/js/uikit-icons.min.js') ?>"></script>
</body>

</html>