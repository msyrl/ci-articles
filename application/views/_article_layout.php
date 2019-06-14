<?php $this->load->view('_topnav'); ?>
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
    <?php if (!empty($data->source)) : ?>
        <div class="uk-text-small uk-text-right">
            <p><?= ucfirst($this->lang->line('source')) . " : " .  $data->source; ?></p>
        </div>
    <?php endif; ?>
    <div class="uk-card uk-text-left">
        <?= htmlspecialchars_decode($data->body); ?>
    </div>
    <hr>
    <?php if (!empty($data->tags)) : ?>
        <div class="padding-horizontal uk-text-bold">
            <p><i class="fas fa-tags"></i> TAGGING :</p>
            <div class="uk-grid-small uk-child-width-auto uk-margin-top uk-text-small uk-text-capitalize" uk-grid>
                <?php $tags = explode(" ", $data->tags); ?>
                <?php foreach ($tags as $tag) : ?>
                    <div>
                        <a href="<?= base_url('search?q=') . trim($tag, "# "); ?>" class="uk-text-muted"><?= $tag; ?></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</article>