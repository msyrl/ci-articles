<!-- Nav -->
<nav class="side-nav">
  <div class="uk-grid-small head-content uk-child-width-expand" uk-grid>
    <div class="uk-grid-small" uk-grid>
      <div class="uk-width-auto">
        <button type="button" class="sidebar-toggle">
          <i class="fas fa-times fa-2x"></i>
        </button>
      </div>
      <div>
        <h2 class="uk-heading-small">IFL</h2>
      </div>
    </div>
    <div class="uk-width-1-2 uk-flex uk-flex-middle search">
      <form class="uk-width-1-1">
        <input class="uk-input uk-form-small" placeholder="Looking for something?" />
      </form>
    </div>
    <div class="uk-flex uk-flex-middle uk-flex-right auth">
      <ul class="uk-navbar-nav">
        <li>
          <a href="#"><i class="fas fa-globe-asia fa-2x"></i>&nbsp;EN</a>
          <div uk-dropdown>
            <ul class="uk-nav uk-dropdown-nav">
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
  </div>
  <div class="main-content">
    <ul class="uk-width-medium@s nav-menu">
      <li>
        <a href="#">IFL Window <i class="fas fa-chevron-right"></i></a>
        <div class="menu-list uk-padding">
          <h3 class="uk-heading-small">IFL Window</h3>
          <div class="uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid>
            <?php if (!empty($teams)) : ?>
              <?php foreach ($teams['data'] as $team) : ?>
                <div>
                  <a href="#">
                    <div class="uk-card uk-card-small uk-card-body">
                      <strong><?= $team->title; ?></strong>
                    </div>
                  </a>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </li>
      <li>
        <a href="#">Publication <i class="fas fa-chevron-right"></i></a>
        <div class="menu-list uk-padding">
          <h3 class="uk-heading-small">Publication</h3>
          <div class="uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid>
            <div>
              <a href="document/publication1.pdf">
                <div class="uk-card uk-card-small uk-card-body">
                  <strong>Green Bond and Green Sukuk Initiative</strong>
                </div>
              </a>
            </div>
            <div>
              <a href="document/publication2.pdf">
                <div class="uk-card uk-card-small uk-card-body">
                  <strong>Innovative Financing Lab</strong>
                </div>
              </a>
            </div>
            <div>
              <a href="document/publication3.pdf">
                <div class="uk-card uk-card-small uk-card-body">
                  <strong>Role of Zakat in Supporting Sustainble Development</strong>
                </div>
              </a>
            </div>
            <div>
              <a href="document/publication4.pdf">
                <div class="uk-card uk-card-small uk-card-body">
                  <strong>Social Impact Bond</strong>
                </div>
              </a>
            </div>
            <div>
              <a href="document/publication5.pdf">
                <div class="uk-card uk-card-small uk-card-body">
                  <strong>Women’s Entrepreneur and Access to Finance</strong>
                </div>
              </a>
            </div>
            <div>
              <a href="document/publication6.pdf">
                <div class="uk-card uk-card-small uk-card-body">
                  <strong>UNDP Services in Financing the SDGs</strong>
                </div>
              </a>
            </div>
            <div>
              <a href="document/publication7.pdf">
                <div class="uk-card uk-card-small uk-card-body">
                  <strong>MTRE3</strong>
                </div>
              </a>
            </div>
          </div>
        </div>
      </li>
      <li>
        <a href="#">Blog <i class="fas fa-chevron-right"></i></a>
        <div class="menu-list uk-padding">
          <h3 class="uk-heading-small">Blog</h3>
          <div class="uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid>
            <div>
              <a href="undpbekraf.html">
                <div class="uk-card uk-card-small uk-card-body">
                  <strong>UNDP Indonesia and BEKRAF join forces to boost youth participation in social
                    entrepreneurship and startups</strong>
                </div>
              </a>
            </div>
            <div>
              <a href="fasttracking.html">
                <div class="uk-card uk-card-small uk-card-body">
                  <strong>Fast-tracking SDGs in eastern Indonesia through youth entrepreneurship</strong>
                </div>
              </a>
            </div>
            <div>
              <a href="undpwakaf.html">
                <div class="uk-card uk-card-small uk-card-body">
                  <strong>UNDP dan Badan Wakaf Indonesia bekerjasama untuk meluncurkan blockchain wakaf untuk
                    SDGs</strong>
                </div>
              </a>
            </div>
          </div>
        </div>
      </li>
      <li>
        <a href="impactaim.html">Impact Aim <i class="fas fa-chevron-right"></i></a>
      </li>
    </ul>
  </div>
</nav>
<nav class="top-nav uk-position-fixed uk-position-top uk-position-z-index uk-navbar-container uk-navbar-transparent" uk-navbar>
  <div class="uk-navbar-left auth">
    <button type="button" class="sidebar-toggle">
      <i class="fas fa-bars fa-2x"></i>
    </button>
  </div>
  <div class="uk-navbar-right auth">
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
<div>
  <nav class="main-nav">
    <ul uk-scrollspy-nav="closest: li; scroll: true">
      <li><a href="#home" class="active">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#blog">Blog</a></li>
      <li><a href="#publication">Publication</a></li>
      <li><a href="#connect">Connect</a></li>
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
        <h2>About the Innovative Financing Lab</h2>
        <p><?= $about->body ? $about->body : ''; ?></p>
      </div>
    </div>
  </div>
</section>
<!-- Blog -->
<section id="blog" class="uk-padding-small" uk-scrollspy="target: .uk-card, .more; cls:uk-animation-slide-left; delay: 350; repeat: true" uk-height-viewport>
  <h1 class="uk-heading-line uk-text-center">
    <span>Blog</span>
  </h1>
  <div class="uk-child-width-1-3@s" uk-grid>
    <?php if (!empty($blogs)) : ?>
      <?php foreach ($blogs['data'] as $blog) : ?>
        <div>
          <div class="uk-card uk-card-small uk-card-hover uk-card-default">
            <div class="uk-background-cover uk-height-small" data-src="<?= $blog->image ? base_url('assets/images/blogs/') . $blog->image : ''; ?>" uk-img>
            </div>
            <div class="uk-card-body uk-height-small">
              <p>
                <?= $blog->title; ?>
              </p>
            </div>
            <div class="uk-card-footer">
              <a href="#" class="uk-button uk-button-text">Read more</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
  <!-- <div class="more uk-flex uk-flex-center uk-padding-small">
          <a href="blog.html" class="uk-button uk-button-default">More Blog</a>
        </div> -->
</section>
<!-- Publication -->
<section id="publication" class="uk-padding-small" uk-height-viewport>
  <h1 class="uk-heading-line uk-text-center">
    <span>Publication</span>
  </h1>
  <div class="uk-child-width-1-2@l" uk-grid>
    <!-- Books -->
    <div uk-scrollspy="target: .uk-card; cls:uk-animation-slide-left; delay: 350; repeat: true">
      <?php if (!empty($books)) : ?>
        <?php foreach ($books['data'] as $book) : ?>
          <div class="uk-card uk-card-medium uk-card-hover uk-card-default uk-grid-collapse uk-margin" uk-grid>
            <div class="uk-width-small uk-cover-container">
              <img src="<?= $book->image ? base_url('assets/images/books/') . $book->image : ''; ?>" alt="<?= $book->title; ?>" uk-cover />
            </div>
            <div class="uk-width-expand">
              <div class="uk-card-body">
                <p>
                  <?= $book->title; ?>
                </p>
              </div>
              <div class="uk-card-footer">
                <a href="<?= $book->attachment ? base_url('assets/attachments/books/') . $book->attachment : '#'; ?>" class="uk-button uk-button-text">Read more</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <!-- Brochures -->
    <div uk-scrollspy="target: .uk-card; cls:uk-animation-fade; delay: 350; repeat: true">
      <?php if (!empty($brochures)) : ?>
        <?php foreach ($brochures['data'] as $brochure) : ?>
          <div class="uk-card uk-card-medium uk-card-hover uk-card-default uk-grid-collapse uk-margin" uk-grid>
            <div class="uk-width-small uk-cover-container">
              <img src="<?= $brochure->image ? base_url('assets/images/brochures/') . $brochure->image : ''; ?>" alt="<?= $brochure->title; ?>" uk-cover />
            </div>
            <div class="uk-width-expand">
              <div class="uk-card-body">
                <p>
                  <?= $brochure->title; ?>
                </p>
              </div>
              <div class="uk-card-footer">
                <a href="<?= $brochure->attachment ? base_url('assets/attachments/brochures/') . $brochure->attachment : '#'; ?>" class="uk-button uk-button-text">Read more</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
  <div class="uk-flex uk-flex-center uk-padding-small" uk-scrollspy="target: a; cls:uk-animation-slide-top; delay: 350; repeat: true">
    <a href="publication.html" class="uk-button uk-button-default">More Publication</a>
  </div>
</section>
<!-- Connect -->
<section id="connect" class="uk-padding uk-background-default">
  <h1 class="uk-heading-line uk-text-center uk-margin-large-bottom">
    <span>Our Connection</span>
  </h1>
  <div class="uk-child-width-1-6 uk-flex-center uk-margin-remove" uk-scrollspy="target: div; cls:uk-animation-fade; delay: 200; repeat: true" uk-grid>
    <?php if (!empty($connects)) : ?>
      <?php foreach ($connects['data'] as $connect) : ?>
        <div>
          <img src="<?= base_url('assets/images/connects/') . $connect->image; ?>" alt="<?= $connect->name; ?>" />
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>