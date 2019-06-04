<h2 class="uk-heading-small uk-margin-remove"><?= ucwords($title); ?></h2>
<hr>
<?php if ($this->session->flashdata('form_status') !== NULL) : ?>
    <div class="uk-alert-<?= $this->session->flashdata('form_status')['status']; ?> uk-animation-slide-top" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <?= $this->session->flashdata('form_status')['message']; ?>
    </div>
<?php endif; ?>
<form class="uk-form-stacked uk-padding-small" action="" method="post" autocomplete="off" enctype="multipart/form-data">
    <div class="uk-margin">
        <label class="uk-form-label" for="body">Body</label>
        <div class="uk-form-controls">
            <textarea class="uk-textarea uk-form-small <?= form_error('body') ? 'uk-form-danger' : '' ?>" id="body" rows="10" name="body" placeholder="Body..." required><?= isset($about) ? $about->body : set_value('body'); ?></textarea>
        </div>
        <?= form_error('body', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="short_body">Short Body</label>
        <div class="uk-form-controls">
            <textarea class="uk-textarea uk-form-small <?= form_error('short_body') ? 'uk-form-danger' : '' ?>" id="short_body" rows="5" name="short_body" placeholder="Body..." required><?= isset($about) ? $about->short_body : set_value('short_body'); ?></textarea>
        </div>
        <?= form_error('short_body', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
    </div>
    <hr>
    <div class="uk-margin">
        <div class="uk-flex uk-flex-center">
            <div>
                <button class="uk-button uk-button-primary" type="submit"><?= isset($about) ? 'Update' : 'Save'; ?></button>
            </div>
            <div class="uk-margin-small-left">
                <button class="uk-button uk-button-default" type="reset">Reset</button>
            </div>
        </div>
    </div>
</form>