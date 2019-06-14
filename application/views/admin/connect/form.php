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
                <label class="uk-form-label" for="name"><?= ucwords($this->lang->line('name')); ?></label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small <?= form_error('name') ? 'uk-form-danger' : '' ?>" id="name" type="text" name="name" value="<?= isset($connect) ? $connect->name : set_value('name'); ?>" placeholder="<?= ucwords($this->lang->line('name')); ?>..." required autofocus>
                </div>
                <?= form_error('name', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
            <div>
                <label class="uk-form-label" for="image"><?= ucwords($this->lang->line('image')) . ' (.jpg/.jpeg/.png/.gif)'; ?></label>
                <div uk-form-custom="target: true">
                    <input type="file" name="image">
                    <input class="uk-input uk-form-small" type="text" placeholder="<?= ucwords($this->lang->line('select') . " " . $this->lang->line('image')); ?>..." disabled>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="is_publish"><?= ucwords($this->lang->line('published')); ?></label>
        <div class="uk-grid-small" uk-grid>
            <label><input class="uk-radio" id="is_publish" type="radio" name="is_publish" value="1" <?= isset($connect) && $connect->is_publish == 1 ? 'checked' : '' ?> required> <?= ucwords($this->lang->line('yes')); ?></label><br>
            <label><input class="uk-radio" type="radio" name="is_publish" value="0" <?= isset($connect) && $connect->is_publish == 0 ? 'checked' : '' ?>> <?= ucwords($this->lang->line('no')); ?></label>
        </div>
    </div>
    <hr>
    <div class="uk-margin">
        <div class="uk-flex uk-flex-center">
            <div>
                <button class="uk-button uk-button-primary" type="submit"><?= isset($connect) ? ucwords($this->lang->line('update')) : $this->lang->line('save'); ?></button>
            </div>
            <?php if (!isset($connect)) : ?>
                <div class="uk-margin-small-left">
                    <button class="uk-button uk-button-default" type="reset">Reset</button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</form>