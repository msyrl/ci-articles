<nav class="top-nav uk-background-secondary uk-text-primary uk-position-fixed uk-position-top uk-position-z-index uk-navbar-container uk-navbar-transparent" uk-navbar>
    <div class="uk-navbar-left">
        <button type="button" class="sidebar-toggle">
            <i class="fas fa-bars fa-2x"></i>
        </button>
        <p><a href="<?= base_url('/'); ?>" class="uk-link-reset">IFL <span class="ext-title">| Blogs</span></a></p>
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
    <?php if (!empty($blogs['data'])) : ?>
        <?php foreach ($blogs['data'] as $blog) : ?>
            <article>
                <div class="uk-child-width-expand" uk-grid>
                    <div class="uk-width-1-4@m">
                        <div class="uk-background-cover uk-height-medium" data-src="<?= empty($blog->image) ? base_url('assets/images/icon/logo.png') : base_url('assets/images/blogs/') . $blog->image; ?>" uk-img>
                        </div>
                    </div>
                    <div>
                        <div class="uk-flex-middle">
                            <div>
                                <h3 class="uk-heading-bullet uk-text-capitalize"><?= $blog->title ?></h3>
                            </div>
                        </div>
                        <p class="uk-text-small">Publish at <?= $blog->created_at; ?></p>
                        <div class="uk-panel uk-panel-box">
                            <?= explode("</p>", htmlspecialchars_decode($blog->body))[0]; ?>
                        </div>
                        <div class="uk-padding uk-text-right">
                            <a href="<?= base_url('blog/') . $blog->slug; ?>" class="uk-button uk-button-text uk-button-small uk-link uk-link-muted">Read more</a>
                        </div>
                    </div>
                </div>
                <hr>
            </article>
        <?php endforeach; ?>
    <?php endif; ?>
    <ul class="uk-pagination uk-flex-right">
        <li class="<?= $blogs['prev_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $blogs['prev_page'] ? (base_url('blog?page=') . $blogs['prev_page']) : '#'; ?>"><span uk-pagination-previous></span></a></li>
        <?php for ($i = 1; $i <= $blogs['total_pages']; $i++) : ?>
            <li class="<?= $blogs['current_page'] == $i ? 'uk-active' : ''; ?>"><a href="<?= base_url('blog?page=') . $i; ?>"><?= $i; ?></a></li>
        <?php endfor; ?>
        <li class="<?= $blogs['next_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $blogs['next_page'] ? (base_url('blog?page=') . $blogs['next_page']) : '#'; ?>"><span uk-pagination-next></span></a></li>
    </ul>
</section>