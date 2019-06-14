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
                <label class="uk-form-label" for="title"><?= ucwords($this->lang->line('title')); ?></label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small <?= form_error('title') ? 'uk-form-danger' : '' ?>" id="title" type="text" name="title" value="<?= isset($blog) ? $blog->title : set_value('title'); ?>" placeholder="<?= ucwords($this->lang->line('title')); ?>..." required autofocus>
                </div>
                <?= form_error('title', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
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
        <label class="uk-form-label" for="source"><?= ucwords($this->lang->line('source')); ?></label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-small <?= form_error('source') ? 'uk-form-danger' : '' ?>" id="source" type="text" name="source" value="<?= isset($blog) ? $blog->source : set_value('source'); ?>" placeholder="<?= ucwords($this->lang->line('source')); ?>..." required>
        </div>
        <?= form_error('source', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="body"><?= ucwords($this->lang->line('body')); ?></label>
        <div class="uk-form-controls">
            <textarea class="uk-textarea uk-form-small <?= form_error('body') ? 'uk-form-danger' : '' ?>" id="body" rows="10" name="body" placeholder="<?= ucwords($this->lang->line('body')); ?>..."><?= isset($blog) ? $blog->body : set_value('body'); ?></textarea>
        </div>
        <?= form_error('body', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="tags">Tags <small><?= $this->lang->line('separate_with_space') . ' (' . ucfirst($this->lang->line('example')) . " : #Innovative #FinancingLab" . ')';  ?></small></label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-small <?= form_error('tags') ? 'uk-form-danger' : '' ?>" id="tags" type="text" name="tags" value="<?= isset($blog) ? $blog->tags : set_value('tags'); ?>" placeholder="Tags <?= $this->lang->line('separate_with_space') . ' (' . ucfirst($this->lang->line('example')) . " : #Innovative #FinancingLab" . ')';  ?>...">
        </div>
        <?= form_error('tags', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="is_publish"><?= ucwords($this->lang->line('published')); ?></label>
        <div class="uk-grid-small" uk-grid>
            <label><input class="uk-radio" id="is_publish" type="radio" name="is_publish" value="1" <?= isset($blog) && $blog->is_publish == 1 ? 'checked' : '' ?> required> <?= ucwords($this->lang->line('yes')); ?></label><br>
            <label><input class="uk-radio" type="radio" name="is_publish" value="0" <?= isset($blog) && $blog->is_publish == 0 ? 'checked' : '' ?>> <?= ucwords($this->lang->line('no')); ?></label>
        </div>
    </div>
    <hr>
    <div class="uk-margin">
        <div class="uk-flex uk-flex-center">
            <div>
                <button class="uk-button uk-button-primary" type="submit"><?= isset($blog) ? ucwords($this->lang->line('update')) : ucwords($this->lang->line('save')); ?></button>
            </div>
            <?php if (!isset($blog)) : ?>
                <div class="uk-margin-small-left">
                    <button class="uk-button uk-button-default" type="reset">Reset</button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</form>