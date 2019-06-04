<nav class="top-nav uk-background-secondary uk-text-primary uk-position-fixed uk-position-top uk-position-z-index uk-navbar-container uk-navbar-transparent" uk-navbar>
    <div class="uk-navbar-left">
        <button type="button" class="sidebar-toggle">
            <i class="fas fa-bars fa-2x"></i>
        </button>
        <p><a href="<?= base_url('/'); ?>" class="uk-link-reset">IFL <span class="ext-title">| <?= $type === 'teams' ? 'Window' : ucwords($type); ?></span></a></p>
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
<article class="uk-margin-medium-top uk-padding uk-animation-fade">
    <h2 class="uk-heading-divider uk-text-capitalize"><?= $type === 'abouts' ? $site_name : $data->title; ?></h2>
    <?php if (!empty($data->image)) : ?>
        <div class="uk-margin">
            <div class="uk-background-cover uk-height-large" data-src="<?= base_url('assets/images/') . $type . '/' . $data->image; ?>" uk-img>
            </div>
        </div>
    <?php elseif ($type === 'abouts') : ?>
        <div class="uk-margin">
            <div class="uk-background-cover uk-height-large" data-src="<?= base_url('assets/images/icon/logo.png'); ?>" uk-img>
            </div>
        </div>
    <?php endif; ?>
    <div class="uk-card uk-text-left">
        <p><?= $data->body; ?></p>
    </div>
    <hr>
    <?php if (!empty($data->tags)) : ?>
        <div class="padding-horizontal uk-text-bold">
            <p><i class="fas fa-tags"></i> TAGGING :</p>
            <div class="uk-grid-small uk-child-width-auto uk-margin-top uk-text-small uk-text-capitalize" uk-grid>
                <div>
                    <a href="#" class="uk-text-muted">#ImpactAccelerator</a>
                </div>
                <div>
                    <a href="#" class="uk-text-muted">#youthentrepreneurship</a>
                </div>
                <div>
                    <a href="#" class="uk-text-muted">#Innovation</a>
                </div>
                <div>
                    <a href="#" class="uk-text-muted">#YouthCoLab</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</article>