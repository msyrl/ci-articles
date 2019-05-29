<h2 class="uk-heading-small uk-margin-remove"><?= ucwords($title); ?></h2>
<hr>
<?php if (isset($upload_error)) : ?>
    <div class="uk-alert-danger uk-animation-slide-top" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <?php foreach ($upload_error as $error) : ?>
            <?= $error; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<form class="uk-form-stacked uk-padding-small" action="" method="post" autocomplete="off" enctype="multipart/form-data">
    <div class="uk-margin">
        <div uk-grid>
            <div class="uk-width-expand">
                <label class="uk-form-label" for="title">Title</label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small <?= form_error('title') ? 'uk-form-danger' : '' ?>" id="title" type="text" name="title" value="<?= isset($book) ? $book->title : set_value('title'); ?>" placeholder="Title..." required autofocus>
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
            <div>
                <label class="uk-form-label" for="attachment">Attachment</label>
                <div class="uk-form-controls" uk-form-custom>
                    <input type="file" name="attachment">
                    <button class="uk-button uk-button-default uk-button-small uk-text-capitalize" type="button" tabindex="-1">Choose File</button>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="source">Source</label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-small <?= form_error('source') ? 'uk-form-danger' : '' ?>" id="source" type="text" name="source" value="<?= isset($book) ? $book->source : set_value('source'); ?>" placeholder="Source..." required>
        </div>
        <?= form_error('source', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="is_publish">Publish</label>
        <div class="uk-grid-small" uk-grid>
            <label><input class="uk-radio" id="is_publish" type="radio" name="is_publish" value="1" <?= isset($book) && $book->is_publish == 1 ? 'checked' : '' ?> required> Yes</label><br>
            <label><input class="uk-radio" type="radio" name="is_publish" value="0" <?= isset($book) && $book->is_publish == 0 ? 'checked' : '' ?>> No</label>
        </div>
    </div>
    <hr>
    <div class="uk-margin">
        <div class="uk-flex uk-flex-center">
            <div>
                <button class="uk-button uk-button-primary" type="submit"><?= isset($book) ? 'Update' : 'Save'; ?></button>
            </div>
            <?php if (!isset($book)) : ?>
                <div class="uk-margin-small-left">
                    <button class="uk-button uk-button-default" type="reset">Reset</button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</form>