<nav class="top-nav uk-background-secondary uk-text-primary uk-position-fixed uk-position-top uk-position-z-index uk-navbar-container uk-navbar-transparent" uk-navbar>
    <div class="uk-navbar-left">
        <button type="button" class="sidebar-toggle">
            <i class="fas fa-bars fa-2x"></i>
        </button>
        <p><a href="<?= base_url('/'); ?>" class="uk-link-reset">IFL <span class="ext-title">| Publications</span></a></p>
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
<section class="uk-margin-medium-top uk-padding uk-animation-fade">
    <div uk-grid class="uk-grid uk-grid-stack">
        <div class="uk-width-auto uk-first-column">
            <h3 class="uk-text-uppercase">
                Publications
            </h3>
            <ul class="uk-nav uk-nav-default">
                <li class="<?= $type === 'book' ? 'uk-active' : ''; ?>"><a href="<?= base_url('publication/book'); ?>" class="uk-heading-bullet uk-text-uppercase">Books</a></li>
                <li class="<?= $type === 'brochure' ? 'uk-active' : ''; ?>"><a href="<?= base_url('publication/brochure'); ?>" class="uk-heading-bullet uk-text-uppercase">Brochures</a></li>
                <!-- <li><a href="#">Videos</a></li> -->
            </ul>
        </div>
        <div class="uk-width-expand@m uk-grid-margin uk-first-column">
            <h3 class="uk-heading-bullet uk-heading-divider">
                Books
            </h3>
            <ul class="uk-list uk-list-divider">
                <?php foreach ($publications['data'] as $publication) : ?>
                    <li>
                        <div class="uk-child-width-expand" uk-grid>
                            <div class="uk-width-1-4@m">
                                <div class="uk-background-contain uk-height-medium" data-src="<?= empty($publication->image) ? base_url('assets/images/icon/logo.png') : base_url('assets/images/') . $type . 's/' . $publication->image; ?>" uk-img>
                                </div>
                            </div>
                            <div class="uk-text-small">
                                <h4 class="uk-heading-bullet uk-text-capitalize"><?= $publication->title; ?></h4>
                                <p>by <?= $publication->updated_by ?>, <?= $publication->created_at; ?></p>
                                <div class="uk-margin">
                                    <a href="<?= empty($publication->attachment) ? '#' : base_url('assets/attachments/books/') . $publication->attachment; ?>" class="uk-button uk-button-small uk-button-default"><span uk-icon="icon: download"></span> Download</a>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <ul class="uk-pagination uk-flex-right">
        <li class="<?= $publications['prev_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $publications['prev_page'] ? (base_url('publication/') . $type . '?page=' . $publications['prev_page']) : '#'; ?>"><span uk-pagination-previous></span></a></li>
        <?php for ($i = 1; $i <= $publications['total_pages']; $i++) : ?>
            <li class="<?= $publications['current_page'] == $i ? 'uk-active' : ''; ?>"><a href="<?= base_url('publication/') . $type . '?page=' . $i; ?>"><?= $i; ?></a></li>
        <?php endfor; ?>
        <li class="<?= $publications['next_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $publications['next_page'] ? (base_url('publication/') . $type . '?page=' . $publications['next_page']) : '#'; ?>"><span uk-pagination-next></span></a></li>
    </ul>
</section>