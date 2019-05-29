<h2 class="uk-heading-small uk-margin-remove"><?= ucwords($title); ?></h2>
<hr>
<?php if (isset($upload_error)) : ?>
    <div class="uk-alert-danger uk-animation-slide-top" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <?= $upload_error; ?>
    </div>
<?php endif; ?>
<form class="uk-form-stacked uk-padding-small" action="" method="post" autocomplete="off">
    <div class="uk-margin">
        <label class="uk-form-label" for="title">Title</label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-small <?= form_error('title') ? 'uk-form-danger' : '' ?>" id="title" type="text" name="title" value="<?= isset($video) ? $video->title : set_value('title'); ?>" placeholder="Title..." required autofocus>
        </div>
        <?= form_error('title', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="link">Link</label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-small <?= form_error('link') ? 'uk-form-danger' : '' ?>" id="link" type="text" name="link" value="<?= isset($video) ? $video->link : set_value('link'); ?>" placeholder="Link..." required>
        </div>
        <?= form_error('link', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="is_publish">Publish</label>
        <div class="uk-grid-small" uk-grid>
            <label><input class="uk-radio" id="is_publish" type="radio" name="is_publish" value="1" <?= isset($video) && $video->is_publish == 1 ? 'checked' : '' ?> required> Yes</label><br>
            <label><input class="uk-radio" type="radio" name="is_publish" value="0" <?= isset($video) && $video->is_publish == 0 ? 'checked' : '' ?>> No</label>
        </div>
    </div>
    <hr>
    <div class="uk-margin">
        <div class="uk-flex uk-flex-center">
            <div>
                <button class="uk-button uk-button-primary" type="submit"><?= isset($video) ? 'Update' : 'Save'; ?></button>
            </div>
            <?php if (!isset($video)) : ?>
                <div class="uk-margin-small-left">
                    <button class="uk-button uk-button-default" type="reset">Reset</button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</form>