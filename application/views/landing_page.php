<nav class="top-nav uk-position-fixed uk-position-top uk-position-z-index uk-navbar-container uk-navbar-transparent" uk-navbar>
  <div class="uk-navbar-left auth">
    <button type="button" class="sidebar-toggle">
      <i class="fas fa-bars fa-2x"></i>
    </button>
  </div>
  <div class="uk-navbar-right auth">
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
          <a href="<?= base_url('admin'); ?>"><i class="fas fa-tachometer-alt fa-2x"></i>&nbsp;<?= ucwords($this->lang->line('admin')); ?></a>
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
<div>
  <nav class="main-nav">
    <ul uk-scrollspy-nav="closest: li; scroll: true">
      <li><a href="#home" class="active"><?= $this->lang->line('home'); ?></a></li>
      <li><a href="#about"><?= $this->lang->line('about'); ?></a></li>
      <li><a href="#blog"><?= $this->lang->line('blog'); ?></a></li>
      <li><a href="#publication"><?= $this->lang->line('publication'); ?></a></li>
      <li><a href="#connect"><?= $this->lang->line('connect'); ?></a></li>
    </ul>
  </nav>
</div>
<!-- Home -->
<section id="home" uk-scrollspy="cls: uk-animation-fade; repeat: true">
  <div class="uk-position-relative uk-visible-toggle uk-light" uk-slideshow="autoplay: true; autoplay-interval: 6000">
    <ul class="uk-slideshow-items" uk-height-viewport>
      <?php if (!empty($slides)) : ?>
        <?php foreach ($slides['data'] as $slide) : ?>
          <li>
            <div class="uk-background-<?= $slide->is_cover ? 'cover' : 'contain'; ?> uk-height-1-1 uk-flex uk-flex-center uk-flex-middle" style="background-image: url(<?= $slide->image ? base_url('assets/images/slides/') . $slide->image : ''; ?>)">
            </div>
            <?php if ($slide->position) : ?>
              <div class="uk-position-large uk-position-<?= $slide->position; ?> uk-overlay-primary uk-padding">
                <h1 class="uk-margin-remove"><?= $slide->title; ?></h1>
              </div>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      <?php endif; ?>
    </ul>
    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
  </div>
</section>
<!-- About -->
<section id="about" uk-scrollspy="cls: uk-animation-scale-up; repeat: true">
  <div class="uk-flex uk-flex-middle" uk-height-viewport>
    <div class="uk-margin-remove">
      <div class="uk-padding">
        <h2 class="uk-text-capitalize"><?= $this->lang->line('about') . " " . $this->lang->line('us'); ?></h2>
        <?= $about->short_body ? htmlspecialchars_decode($about->short_body) : ''; ?>
        <div class="uk-flex uk-flex-center uk-padding-small" uk-scrollspy="target: a; cls:uk-animation-slide-top; delay: 750; repeat: true">
          <a href="<?= base_url('about'); ?>" class="uk-button uk-button-default"><?= $this->lang->line('read') . " " . $this->lang->line('more'); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Blog -->
<section id="blog" class="uk-padding-small" uk-scrollspy="target: .uk-card, .more; cls:uk-animation-slide-left; delay: 350; repeat: true">
  <h1 class="uk-heading-line uk-text-center">
    <span class="uk-text-capitalize"><?= $this->lang->line('blog'); ?></span>
  </h1>
  <div class="uk-flex uk-flex-center" uk-grid>
    <?php if (!empty($blogs['data'])) : ?>
      <?php for ($i = 0; $i < 3; $i++) : ?>
        <?php if (!empty($blogs['data'][$i])) : ?>
          <div class="uk-width-medium@s">
            <div class="uk-card uk-card-small uk-card-hover uk-card-default">
              <div class="uk-background-cover uk-height-small" data-src="<?= $blogs['data'][$i]->image ? base_url('assets/images/blogs/') . $blogs['data'][$i]->image : ''; ?>" uk-img>
              </div>
              <div class="uk-card-body uk-height-small">
                <p>
                  <?= $blogs['data'][$i]->title; ?>
                </p>
              </div>
              <div class="uk-card-footer">
                <a href="<?= base_url('blog/') . $blogs['data'][$i]->slug; ?>" class="uk-button uk-button-text"><?= $this->lang->line('read') . " " . $this->lang->line('more'); ?></a>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endfor; ?>
    <?php endif; ?>
  </div>
  <div class="more uk-flex uk-flex-center uk-padding-small">
    <a href="<?= base_url('blog'); ?>" class="uk-button uk-button-default"><?= $this->lang->line('more') . " " . $this->lang->line('blog'); ?></a>
  </div>
</section>
<!-- Publication -->
<section id="publication" class="uk-padding-small">
  <h1 class="uk-heading-line uk-text-center">
    <span class="uk-text-capitalize"><?= $this->lang->line('publication'); ?></span>
  </h1>
  <div class="uk-child-width-1-2@l" uk-grid>
    <!-- Books -->
    <div uk-scrollspy="target: .uk-card; cls:uk-animation-slide-left; delay: 350; repeat: true">
      <?php if (!empty($books['data'])) : ?>
        <?php for ($i = 0; $i < 2; $i++) : ?>
          <?php if (!empty($books['data'][$i])) : ?>
            <div class="uk-card uk-card-medium uk-card-hover uk-card-default uk-grid-collapse uk-margin" uk-grid>
              <div class="uk-width-small uk-cover-container">
                <img src="<?= $books['data'][$i]->image ? base_url('assets/images/books/') . $books['data'][$i]->image : ''; ?>" alt="<?= $books['data'][$i]->title; ?>" uk-cover />
              </div>
              <div class="uk-width-expand">
                <div class="uk-card-body">
                  <p>
                    <?= $books['data'][$i]->title; ?>
                  </p>
                </div>
                <div class="uk-card-footer">
                  <a href="<?= $books['data'][$i]->attachment ? base_url('assets/attachments/books/') . $books['data'][$i]->attachment : '#'; ?>" class="uk-button uk-button-text"><?= $this->lang->line('read') . " " . $this->lang->line('more'); ?></a>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endfor; ?>
      <?php endif; ?>
    </div>
    <!-- Brochures -->
    <div uk-scrollspy="target: .uk-card; cls:uk-animation-fade; delay: 350; repeat: true">
      <?php if (!empty($brochures['data'])) : ?>
        <?php for ($i = 0; $i < 2; $i++) : ?>
          <?php if (!empty($brochures['data'][$i])) : ?>
            <div class="uk-card uk-card-medium uk-card-hover uk-card-default uk-grid-collapse uk-margin" uk-grid>
              <div class="uk-width-small uk-cover-container">
                <img src="<?= $brochures['data'][$i]->image ? base_url('assets/images/brochures/') . $brochures['data'][$i]->image : ''; ?>" alt="<?= $brochures['data'][$i]->title; ?>" uk-cover />
              </div>
              <div class="uk-width-expand">
                <div class="uk-card-body">
                  <p>
                    <?= $brochures['data'][$i]->title; ?>
                  </p>
                </div>
                <div class="uk-card-footer">
                  <a href="<?= $brochures['data'][$i]->attachment ? base_url('assets/attachments/brochures/') . $brochures['data'][$i]->attachment : '#'; ?>" class="uk-button uk-button-text"><?= $this->lang->line('read') . " " . $this->lang->line('more'); ?></a>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endfor; ?>
      <?php endif; ?>
    </div>
  </div>
  <div class="uk-flex uk-flex-center uk-padding-small" uk-scrollspy="target: a; cls:uk-animation-slide-top; delay: 350; repeat: true">
    <a href="<?= base_url('publication/book'); ?>" class="uk-button uk-button-default"><?= $this->lang->line('more') . " " . $this->lang->line('publication'); ?></a>
  </div>
</section>
<!-- Connect -->
<section id="connect" class="uk-padding uk-background-default">
  <h1 class="uk-heading-line uk-text-center uk-margin-large-bottom">
    <span class="uk-text-capitalize"><?= $this->lang->line('our_connection'); ?></span>
  </h1>
  <div class="uk-child-width-1-6@m uk-flex uk-flex-center uk-margin-remove" uk-scrollspy="target: div; cls:uk-animation-fade; delay: 200; repeat: true" uk-grid>
    <?php if (!empty($connects['data'])) : ?>
      <?php foreach ($connects['data'] as $connect) : ?>
        <div class="uk-flex uk-flex-center uk-flex-middle">
          <img src="<?= base_url('assets/images/connects/') . $connect->image; ?>" alt="<?= $connect->name; ?>" title="<?= $connect->name; ?>" />
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>