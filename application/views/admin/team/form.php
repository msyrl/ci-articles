<h2 class="uk-heading-small uk-margin-remove"><?= ucwords($title); ?></h2>
<hr>
<?php if (isset($upload_error)) : ?>
    <div class="uk-alert-danger uk-animation-slide-top" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <?= $upload_error; ?>
    </div>
<?php endif; ?>
<form class="uk-form-stacked uk-padding-small" action="" method="post" autocomplete="off" enctype="multipart/form-data">
    <div class="uk-margin">
        <div uk-grid>
            <div class="uk-width-expand">
                <label class="uk-form-label" for="title">Title</label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small <?= form_error('title') ? 'uk-form-danger' : '' ?>" id="title" type="text" name="title" value="<?= isset($team) ? $team->title : set_value('title'); ?>" placeholder="Title..." required autofocus>
                </div>
                <?= form_error('title', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
            <div>
                <label class="uk-form-label" for="image">Image</label>
                <div class="uk-form-controls" uk-form-custom>
                    <input type="file" name="image">
                    <button class="uk-button uk-button-default uk-button-small uk-text-capitalize" type="button" tabindex="-1">Choose File</button>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="body">Body</label>
        <div class="uk-form-controls">
            <textarea class="uk-textarea uk-form-small <?= form_error('body') ? 'uk-form-danger' : '' ?>" id="body" rows="10" name="body" placeholder="Description..." required><?= isset($team) ? $team->body : set_value('body'); ?></textarea>
        </div>
        <?= form_error('body', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
    </div>
    <hr>
    <div class="uk-margin">
        <div class="uk-flex uk-flex-center">
            <div>
                <button class="uk-button uk-button-primary" type="submit"><?= isset($team) ? 'Update' : 'Save'; ?></button>
            </div>
            <?php if (!isset($team)) : ?>
                <div class="uk-margin-small-left">
                    <button class="uk-button uk-button-default" type="reset">Reset</button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</form>