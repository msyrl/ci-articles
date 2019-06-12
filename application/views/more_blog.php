<?php $this->load->view('_topnav'); ?>
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
                        <p class="uk-text-small"><?= ucfirst($this->lang->line('publish_at')) . " " . $blog->created_at; ?></p>
                        <div class="uk-panel uk-panel-box">
                            <?= explode("</p>", htmlspecialchars_decode($blog->body))[0]; ?>
                        </div>
                        <div class="uk-padding uk-text-right">
                            <a href="<?= base_url('blog/') . $blog->slug; ?>" class="uk-button uk-button-text uk-button-small uk-link uk-link-muted"><?= $this->lang->line('read') . " " . $this->lang->line('more'); ?></a>
                        </div>
                    </div>
                </div>
                <hr>
            </article>
        <?php endforeach; ?>
    <?php endif; ?>
    <ul class="uk-pagination uk-flex-right">
        <li class="<?= $blogs['prev_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $blogs['prev_page'] ? (base_url('blog?page=') . $blogs['prev_page']) : '#'; ?>"><span uk-pagination-previous></span> <?= ucfirst($this->lang->line('previous')); ?></a></li>
        <?php for ($i = 1; $i <= $blogs['total_pages']; $i++) : ?>
            <li class="<?= $blogs['current_page'] == $i ? 'uk-active' : ''; ?>"><a href="<?= base_url('blog?page=') . $i; ?>"><?= $i; ?></a></li>
        <?php endfor; ?>
        <li class="<?= $blogs['next_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $blogs['next_page'] ? (base_url('blog?page=') . $blogs['next_page']) : '#'; ?>"><?= ucfirst($this->lang->line('next')); ?> <span uk-pagination-next></span></a></li>
    </ul>
</section>