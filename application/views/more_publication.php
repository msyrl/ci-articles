<?php $this->load->view('_topnav'); ?>
<section class="uk-margin-medium-top uk-padding uk-animation-fade">
    <div uk-grid class="uk-grid uk-grid-stack">
        <div class="uk-width-auto uk-first-column">
            <h3 class="uk-text-uppercase">
                <?= $this->lang->line('publications'); ?>
            </h3>
            <ul class="uk-nav uk-nav-default">
                <li class="<?= $type === 'book' ? 'uk-active' : ''; ?>"><a href="<?= base_url('publication/book'); ?>" class="uk-heading-bullet uk-text-uppercase"><?= $this->lang->line('books'); ?></a></li>
                <li class="<?= $type === 'brochure' ? 'uk-active' : ''; ?>"><a href="<?= base_url('publication/brochure'); ?>" class="uk-heading-bullet uk-text-uppercase"><?= $this->lang->line('brochures'); ?></a></li>
                <li class="<?= $type === 'video' ? 'uk-active' : ''; ?>"><a href="<?= base_url('publication/video'); ?>" class="uk-heading-bullet uk-text-uppercase"><?= $this->lang->line('videos'); ?></a></li>
                <!-- <li><a href="#">Videos</a></li> -->
            </ul>
        </div>
        <div class="uk-width-expand@m uk-grid-margin uk-first-column">
            <h3 class="uk-heading-bullet uk-heading-divider"><?= $meta_title; ?></h3>
            <ul class="uk-list uk-list-divider">
                <?php if (!empty($publications['data'])) : ?>
                    <?php foreach ($publications['data'] as $publication) : ?>
                        <?php if ($type === 'video') : ?>
                            <li class="uk-margin">
                                <iframe class="uk-width-1-1 uk-height-large" src="https://www.youtube.com/embed/<?= $publication->link; ?>?autoplay=0" frameborder="0" allowfullscreen uk-video></iframe>
                            </li>
                        <?php else : ?>
                            <li>
                                <div class="uk-child-width-expand" uk-grid>
                                    <div class="uk-width-1-4@m">
                                        <div class="uk-background-contain uk-height-medium" data-src="<?= empty($publication->image) ? base_url('assets/images/icon/logo.png') : base_url('assets/images/') . $type . 's/' . $publication->image; ?>" uk-img>
                                        </div>
                                    </div>
                                    <div class="uk-text-small">
                                        <h4 class="uk-heading-bullet uk-text-capitalize"><?= $publication->title; ?></h4>
                                        <p><?= $this->lang->line('by') . " " . $publication->updated_by . ", " . $publication->created_at; ?></p>
                                        <div class="uk-margin">
                                            <a href="<?= empty($publication->attachment) ? '#' : base_url('assets/attachments/') . $type . 's/' . $publication->attachment; ?>" class="uk-button uk-button-small uk-button-default"><span uk-icon="icon: download"></span> <?= ucfirst($this->lang->line('download')); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <ul class="uk-pagination uk-flex-right">
        <li class="<?= $publications['prev_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $publications['prev_page'] ? (base_url('publication/') . $type . '?page=' . $publications['prev_page']) : '#'; ?>"><span uk-pagination-previous></span> <?= ucfirst($this->lang->line('previous')) ?></a></li>
        <?php for ($i = 1; $i <= $publications['total_pages']; $i++) : ?>
            <li class="<?= $publications['current_page'] == $i ? 'uk-active' : ''; ?>"><a href="<?= base_url('publication/') . $type . '?page=' . $i; ?>"><?= $i; ?></a></li>
        <?php endfor; ?>
        <li class="<?= $publications['next_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $publications['next_page'] ? (base_url('publication/') . $type . '?page=' . $publications['next_page']) : '#'; ?>"><?= ucfirst($this->lang->line('next')); ?> <span uk-pagination-next></span></a></li>
    </ul>
</section>