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
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-expand">
                <label class="uk-form-label" for="title">Title</label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small <?= form_error('title') ? 'uk-form-danger' : '' ?>" id="title" type="text" name="title" value="<?= isset($slide) ? $slide->title : set_value('title'); ?>" placeholder="Title..." required autofocus>
                </div>
                <?= form_error('title', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
            <div>
                <label class="uk-form-label" for="position">Position</label>
                <div class="uk-form-controls">
                    <select name="position" id="position" class="uk-select uk-form-small">
                        <option value="" hidden selected>Position..</option>
                        <option value="top">Full Top</option>
                        <option value="right">Full Right</option>
                        <option value="bottom">Full Bottom</option>
                        <option value="left">Full Left</option>
                        <option value="top-left">Top Left</option>
                        <option value="top-center">Top Center</option>
                        <option value="top-right">Top Right</option>
                        <option value="center-left">Center Left</option>
                        <option value="center">Center</option>
                        <option value="center-right">Center Right</option>
                        <option value="bottom-left">Bottom Left</option>
                        <option value="bottom-center">Bottom Center</option>
                        <option value="bottom-right">Bottom Right</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="uk-form-label" for="is_cover">Cover</label>
                <div class="uk-grid-small" uk-grid>
                    <label><input class="uk-checkbox" id="is_cover" type="checkbox" name="is_cover" value="1" <?= isset($slide) && $slide->is_cover == 1 ? 'checked' : '' ?>> Yes</label><br>
                </div>
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
        <label class="uk-form-label" for="is_publish">Publish</label>
        <div class="uk-grid-small" uk-grid>
            <label><input class="uk-radio" id="is_publish" type="radio" name="is_publish" value="1" <?= isset($slide) && $slide->is_publish == 1 ? 'checked' : '' ?> required> Yes</label><br>
            <label><input class="uk-radio" type="radio" name="is_publish" value="0" <?= isset($slide) && $slide->is_publish == 0 ? 'checked' : '' ?>> No</label>
        </div>
    </div>
    <hr>
    <div class="uk-margin">
        <div class="uk-flex uk-flex-center">
            <div>
                <button class="uk-button uk-button-primary" type="submit"><?= isset($slide) ? 'Update' : 'Save'; ?></button>
            </div>
            <?php if (!isset($slide)) : ?>
                <div class="uk-margin-small-left">
                    <button class="uk-button uk-button-default" type="reset">Reset</button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</form>