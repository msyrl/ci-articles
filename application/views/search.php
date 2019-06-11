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
                        <li class="<?= $this->session->userdata('lang') === 'english' ? 'uk-active uk-disabled' : ''; ?>"><a href="<?= base_url('set_lang?lang=english'); ?>">English</a></li>
                        <li class="<?= $this->session->userdata('lang') === 'indonesia' ? 'uk-active uk-disabled' : ''; ?>"><a href="<?= base_url('set_lang?lang=indonesia'); ?>">Indonesia</a></li>
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
    <?php if (isset($result)) : ?>
        <?php foreach ($result['data'] as $data) : ?>
            <article>
                <div class="uk-child-width-expand" uk-grid>
                    <div class="uk-width-1-4@m">
                        <div class="uk-background-cover uk-height-medium" data-src="<?= isset($data['image']) && !empty($data['image']) ? base_url('assets/images/') . $data['type'] . '/' . $data['image'] : base_url('assets/images/icon/logo.png'); ?>" uk-img>
                        </div>
                    </div>
                    <div>
                        <div class="uk-flex-middle">
                            <div>
                                <h3 class="uk-heading-bullet uk-text-capitalize"><?= $data['title']; ?></h3>
                            </div>
                        </div>
                        <p class="uk-text-small">Publish at <?= $data['created_at']; ?></p>
                        <?php if (isset($data['body']) && !empty($data['body'])) : ?>
                            <div class="uk-panel uk-panel-box">
                                <?= explode("</p>", htmlspecialchars_decode($data['body']))[0]; ?>
                            </div>
                        <?php endif; ?>
                        <div class="uk-padding uk-text-right">
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
                <hr>
            </article>
        <?php endforeach; ?>
    <?php endif; ?>
    <ul class="uk-pagination uk-flex-right">
        <li class="<?= $result['prev_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $result['prev_page'] ? $result['prev_page'] : '#'; ?>"><span uk-pagination-previous></span> Previous</a></li>
        <li class="<?= $result['next_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $result['next_page'] ? $result['next_page'] : '#'; ?>">Next <span uk-pagination-next></span></a></li>
    </ul>
</section>