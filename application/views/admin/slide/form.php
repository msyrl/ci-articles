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
                <label class="uk-form-label" for="title"><?= ucwords($this->lang->line('title')); ?></label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small <?= form_error('title') ? 'uk-form-danger' : '' ?>" id="title" type="text" name="title" value="<?= isset($slide) ? $slide->title : set_value('title'); ?>" placeholder="<?= ucwords($this->lang->line('title')); ?>..." required autofocus>
                </div>
                <?= form_error('title', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
            <div class="uk-width-small@s">
                <label class="uk-form-label" for="position"><?= ucwords($this->lang->line('title_position')); ?></label>
                <div class="uk-form-controls">
                    <select name="position" id="position" class="uk-select uk-form-small">
                        <option value="" hidden selected><?= ucwords($this->lang->line('title_position')); ?>..</option>
                        <option value="top"><?= ucwords($this->lang->line('full_top')); ?></option>
                        <option value="right"><?= ucwords($this->lang->line('full_right')); ?></option>
                        <option value="bottom"><?= ucwords($this->lang->line('full_bottom')); ?></option>
                        <option value="left"><?= ucwords($this->lang->line('full_left')); ?></option>
                        <option value="top-left"><?= ucwords($this->lang->line('top_left')); ?></option>
                        <option value="top-center"><?= ucwords($this->lang->line('top_center')); ?></option>
                        <option value="top-right"><?= ucwords($this->lang->line('top_right')); ?></option>
                        <option value="center-left"><?= ucwords($this->lang->line('center_left')); ?></option>
                        <option value="center"><?= ucwords($this->lang->line('center')); ?></option>
                        <option value="center-right"><?= ucwords($this->lang->line('center_right')); ?></option>
                        <option value="bottom-left"><?= ucwords($this->lang->line('bottom_left')); ?></option>
                        <option value="bottom-center"><?= ucwords($this->lang->line('bottom_center')); ?></option>
                        <option value="bottom-right"><?= ucwords($this->lang->line('bottom_right')); ?></option>
                    </select>
                </div>
            </div>
        </div>
        <div class="uk-grid-small" uk-grid>
            <div>
                <label class="uk-form-label" for="image"><?= ucwords($this->lang->line('image')) . ' (.jpg/.jpeg/.png/.gif)'; ?></label>
                <div uk-form-custom="target: true">
                    <input type="file" name="image">
                    <input class="uk-input uk-form-small" type="text" placeholder="<?= ucwords($this->lang->line('select') . " " . $this->lang->line('image')); ?>..." disabled>
                </div>
            </div>
            <div>
                <label class="uk-form-label" for="is_cover"><?= ucwords($this->lang->line('full')); ?></label>
                <div class="uk-grid-small" uk-grid>
                    <label><input class="uk-checkbox" id="is_cover" type="checkbox" name="is_cover" value="1" <?= isset($slide) && $slide->is_cover == 1 ? 'checked' : '' ?>> <?= ucwords($this->lang->line('yes')); ?></label><br>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="is_publish"><?= ucwords($this->lang->line('published')); ?></label>
        <div class="uk-grid-small" uk-grid>
            <label><input class="uk-radio" id="is_publish" type="radio" name="is_publish" value="1" <?= isset($slide) && $slide->is_publish == 1 ? 'checked' : '' ?> required> <?= ucwords($this->lang->line('yes')); ?></label><br>
            <label><input class="uk-radio" type="radio" name="is_publish" value="0" <?= isset($slide) && $slide->is_publish == 0 ? 'checked' : '' ?>> <?= ucwords($this->lang->line('no')); ?></label>
        </div>
    </div>
    <hr>
    <div class="uk-margin">
        <div class="uk-flex uk-flex-center">
            <div>
                <button class="uk-button uk-button-primary" type="submit"><?= isset($slide) ? ucwords($this->lang->line('update')) : ucwords($this->lang->line('save')); ?></button>
            </div>
            <?php if (!isset($slide)) : ?>
                <div class="uk-margin-small-left">
                    <button class="uk-button uk-button-default" type="reset">Reset</button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</form>