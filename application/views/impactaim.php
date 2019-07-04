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

<body uk-scrollspy="cls: uk-animation-fade; target: > section > *; delay: 300; repeat: true">
    <div class="uk-position-fixed uk-position-z-index uk-position-top-left">
        <a href="<?= base_url('/'); ?>" class="uk-button button-back"><i class="fas fa-chevron-left"></i> back</a>
    </div>
    <section class="uk-flex uk-flex-column uk-flex-center uk-flex-middle">
        <div class="uk-flex uk-flex-around uk-width-large">
            <div class="uk-background-contain uk-height-small" data-src="<?= base_url('assets/impactaim/logo_undp.svg'); ?>" uk-svg></div>
            <div class="uk-background-contain uk-height-small" data-src="<?= base_url('assets/impactaim/logo_impact_aim.svg'); ?>" uk-svg></div>
        </div>
        <h1 class="uk-text-bold" style="font-size: 2.7rem; letter-spacing: 3px; color: #155ead;">Act.Impact.Scale</h1>
    </section>
    <section>
        <div class="_image">
            <img data-src="<?= base_url('assets/impactaim/bg_2.png'); ?>" width="100%" uk-img>
        </div>
        <div class="_content uk-flex uk-flex-center uk-flex-middle">
            <div style="max-width: 65%">
                <h1 class="uk-text-bold uk-text-truncate text-white">Why ImpactAim?</h1>
                <div>
                    <div>
                        <h4 class="uk-margin-remove uk-text-justify text-white small-heading">A joint initiative from UNDP Indonesia, 500 Startups and Bukalapak to support entrepreneurs to scale their impact, ImpactAim launched in Indonesia after a successful pilot in Armenia.</h4>
                        <h4 class="uk-margin-remove uk-text-justify text-white small-heading">ImpactAim focus to empower SDG-aligned ventures, through guidance on impact measurement, management, reporting and business acceleration. Selected ventures will received tailored mentorship and impact curriculum, that enables them to leverage impact network better, to accelerate their growth. By joining forces with Silicon Valley based VC and top e-commerce unicorn in Indonesia, this program aim to improve’s life through business.</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="_image">
            <img data-src="<?= base_url('assets/impactaim/bg_3.png'); ?>" width="100%" uk-img>
        </div>
        <div class="_content uk-flex uk-flex-column uk-flex-center uk-flex-middle">
            <h3 class="uk-text-center spacing-1-5" style="width: 70%; font-size: 1.2rem">By joining ImpactAim, startups can gain access to capacity building in measuring impact, Impact growth, impact reporting to fundraise and expanding market.</h3>
            <div class="uk-margin-top uk-flex uk-flex-center uk-grid-collapse uk-child-width-1-3@m" style="width: 80%" uk-grid>
                <div class="uk-flex uk-flex-column uk-flex-middle">
                    <img src="<?= base_url('assets/impactaim/logo_5_1.svg'); ?>" width="250" height="250" uk-svg>
                    <h4 class="uk-margin-small-top uk-width-medium uk-text-bold uk-text-center spacing-1-5" style="font-style: italic">business development guidance</h4>
                </div>
                <div class="uk-flex uk-flex-column uk-flex-middle">
                    <img src="<?= base_url('assets/impactaim/logo_5_2.svg'); ?>" width="250" height="250" uk-svg>
                    <h4 class="uk-margin-small-top uk-width-medium uk-text-bold uk-text-center spacing-1-5" style="font-style: italic">global access facilitation through UNDP channels</h4>
                </div>
                <div class="uk-flex uk-flex-column uk-flex-middle">
                    <img src="<?= base_url('assets/impactaim/logo_5_3.svg'); ?>" width="250" height="250" uk-svg>
                    <h4 class="uk-margin-small-top uk-width-medium uk-text-bold uk-text-center spacing-1-5" style="font-style: italic">funding access facilitation</h4>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="_image">
            <img data-src="<?= base_url('assets/impactaim/bg_4.png'); ?>" width="100%" uk-img>
        </div>
        <div class="_content uk-grid-collapse uk-child-width-1-2@m" uk-grid>
            <div class="uk-padding uk-flex uk-flex-center uk-flex-column" uk-scrollspy="cls: uk-animation-scale-up; repeat: true">
                <h1 class="uk-text-bold uk-text-truncate uk-margin-remove-vertical uk-margin-large-left text-white" style="font-size: 5rem">SELECTION</h1>
                <h2 class="uk-text-bold uk-text-truncate uk-margin-remove-vertical uk-margin-large-left text-white" style="font-size: 5rem">CRITERIA</h2>
            </div>
            <div class="uk-flex uk-flex-around uk-flex-column" style="margin: 3rem 0" uk-scrollspy="cls: uk-animation-slide-bottom; target: > div; delay: 300; repeat: true">
                <div class="uk-grid-collapse uk-child-width-expand@m" uk-grid>
                    <div class="uk-width-auto@m uk-flex uk-flex-center">
                        <img src="<?= base_url('assets/impactaim/logo_3_1.svg'); ?>" width="100" height="100" uk-svg>
                    </div>
                    <h3 class="uk-flex uk-flex-middle uk-padding spacing-1-5 text-white small-heading">Product is addressing one or more Sustainable Development Goals and already fully commercial</h3>
                </div>
                <div class="uk-grid-collapse uk-child-width-expand@m" uk-grid>
                    <div class="uk-width-auto@m uk-flex uk-flex-center">
                        <img class="uk-margin-medium-left" src="<?= base_url('assets/impactaim/logo_3_3.svg'); ?>" width="100" height="100" uk-svg>
                    </div>
                    <h3 class="uk-flex uk-flex-middle uk-padding spacing-1-5 text-white small-heading">Proven ready-to-scale and sustainable business model</h3>
                </div>
                <div class="uk-grid-collapse uk-child-width-expand@m" uk-grid>
                    <div class="uk-width-auto@m uk-flex uk-flex-center">
                        <img src="<?= base_url('assets/impactaim/logo_3_4.svg'); ?>" width="100" height="100" uk-svg>
                    </div>
                    <h3 class="uk-flex uk-flex-middle uk-padding spacing-1-5 text-white small-heading">Have formed management team and operations already running</h3>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="_image">
            <img data-src="<?= base_url('assets/impactaim/bg_5.png'); ?>" width="100%" uk-img>
        </div>
        <div class="_content uk-flex uk-flex-column uk-flex-center uk-flex-middle">
            <h3 class="uk-text-center uk-margin-remove text-gray small-heading spacing-5">IMPACT AIM INDONESIA</h3>
            <h1 class="uk-text-bold uk-text-center uk-margin-remove uk-width-xlarge text-white" style="font-size: 5rem">CALL FOR APPLICATIONS
            </h1>
            <h4 class="uk-text-center uk-margin-remove text-gray small-heading spacing-5">DEADLINE: 18 JULY 2019</h4>
        </div>
    </section>
    <section class="uk-margin-medium-top uk-margin-medium-bottom">
        <h2 class="uk-heading-line uk-margin-auto uk-text-center uk-text-bold uk-width-2-3"><span>Collaborating Partners</span></h2>
        <div class="uk-flex uk-flex-around uk-width-2-3 uk-margin-auto">
            <div class="uk-background-contain uk-width-small uk-height-small" data-src="<?= base_url('assets/impactaim/logo_500.svg'); ?>" uk-svg></div>
            <div class="uk-background-contain uk-width-small uk-height-small" data-src="<?= base_url('assets/impactaim/logo_bukalapak.svg'); ?>" uk-svg></div>
            <div class="uk-background-contain uk-width-small uk-height-small" data-src="<?= base_url('assets/impactaim/logo_undp.svg'); ?>" uk-svg></div>
            <div class="uk-background-contain uk-width-small uk-height-small" data-src="<?= base_url('assets/impactaim/logo_impact_aim.svg'); ?>" uk-svg></div>
        </div>
    </section>
    <script src="<?= base_url('assets/vendor/uikit/js/uikit.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/uikit/js/uikit-icons.min.js') ?>"></script>
</body>

</html>