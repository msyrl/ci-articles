<nav class="top-nav uk-background-secondary uk-text-primary uk-position-fixed uk-position-top uk-position-z-index uk-navbar-container uk-navbar-transparent" uk-navbar>
    <div class="uk-navbar-left">
        <p><a href="<?= base_url('/'); ?>" class="uk-link-reset">IFL <span class="ext-title">| <?= $meta_title; ?></span></a></p>
    </div>
    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
            <li>
                <a href="#"><i class="fas fa-globe-asia fa-2x"></i>&nbsp;<?= $lang; ?></a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="<?= $this->session->userdata('lang') === 'english' ? 'uk-active uk-disabled' : ''; ?>"><a href="<?= base_url('set_lang?lang=english'); ?>">English</a></li>
                        <li class="<?= $this->session->userdata('lang') === 'indonesia' ? 'uk-active uk-disabled' : ''; ?>"><a href="<?= base_url('set_lang?lang=indonesia'); ?>">Indonesia</a></li>
                    </ul>
                </div>
            </li>
            <?php if ($this->session->userdata('user')) : ?>
                <li>
                    <a href="<?= base_url('/'); ?>"><i class="fas fa-home fa-2x"></i>&nbsp;<?= ucwords($this->lang->line('home')); ?></a>
                </li>
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
</nav>