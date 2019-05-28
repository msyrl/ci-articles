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
        <label class="uk-form-label" for="name">Name</label>
        <div class="uk-form-controls">
            <input type="hidden" name="id" value="<?= isset($role) ? $role->id : ''; ?>">
            <input class="uk-input uk-form-small <?= form_error('name') ? 'uk-form-danger' : '' ?>" id="name" type="text" name="name" value="<?= isset($role) ? $role->name : set_value('name'); ?>" placeholder="Name..." required autofocus>
        </div>
        <?= form_error('name', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
    </div>
    <hr>
    <div class="uk-margin">
        <div class="uk-flex uk-flex-center">
            <div>
                <button class="uk-button uk-button-primary" type="submit"><?= isset($role) ? 'Update' : 'Save'; ?></button>
            </div>
            <?php if (!isset($role)) : ?>
                <div class="uk-margin-small-left">
                    <button class="uk-button uk-button-default" type="reset">Reset</button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</form>