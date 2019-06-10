<nav class="top-nav uk-background-secondary uk-text-primary uk-position-fixed uk-position-top uk-position-z-index uk-navbar-container uk-navbar-transparent" uk-navbar>
    <div class="uk-navbar-left">
        <button type="button" class="sidebar-toggle">
            <i class="fas fa-bars fa-2x"></i>
        </button>
        <p><a href="<?= base_url('/'); ?>" class="uk-link-reset">IFL <span class="ext-title">| Search</span></a></p>
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
            <?php else : ?>
                <li>
                    <a href="<?= base_url('login'); ?>"><i class="fas fa-user-circle fa-2x"></i>&nbsp;Login</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<section class="uk-margin-medium-top uk-padding uk-animation-fade">
    <div>
        <form action="" method="get" autocomplete="off">
            <div class="uk-margin">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: search"></span>
                    <input class="uk-input" type="search" name="q" placeholder="Looking for something?" value="<?= $this->input->get('q') ?>">
                </div>
            </div>
        </form>
    </div>
    <div class="uk-grid-small uk-child-width-1-3@m" uk-grid>
        <?php if (isset($result)) : ?>
            <?php foreach ($result as $data) : ?>
                <div>
                    <div class="uk-card uk-card-small uk-card-hover uk-card-default">
                        <div class="uk-background-cover uk-height-small" data-src="<?= isset($data['image']) && !empty($data['image']) ? base_url('assets/images/') . $data['type'] . '/' . $data['image'] : base_url('assets/images/icon/logo.png'); ?>" uk-img>
                        </div>
                        <div class="uk-card-body">
                            <p>
                                <?= $data['title']; ?>
                            </p>
                        </div>
                        <div class="uk-card-footer">
                            <?php if ($data['type'] === 'teams') : ?>
                                <a href="<?= base_url('window/') . $data['slug']; ?>" class="uk-button uk-button-text">Read more</a>
                            <?php elseif ($data['type'] === 'books' || $data['type'] === 'brochures') : ?>
                                <a href="<?= isset($data['attachment']) && !empty($data['attachment']) ? base_url('assets/attachments/') . $data['type'] . '/' . $data['attachment'] : '#'; ?>" class="uk-button uk-button-text">Read more</a>
                            <?php else : ?>
                                <a href="<?= base_url('/') . substr($data['type'], 0, -1) . '/' . $data['slug']; ?>" class="uk-button uk-button-text">Read more</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>