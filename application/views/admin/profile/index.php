<h2 class="uk-heading-small uk-margin-remove"><?= ucwords($title); ?></h2>
<hr>
<?php if ($this->session->flashdata('form_status') !== NULL) : ?>
    <div class="uk-alert-<?= $this->session->flashdata('form_status')['status']; ?> uk-animation-slide-top" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <?= $this->session->flashdata('form_status')['message']; ?>
    </div>
<?php endif; ?>
<form class="uk-form-stacked uk-padding-small" action="" method="post" autocomplete="off">
    <div class="uk-margin">
        <div class="uk-grid-small uk-child-width-expand@m" uk-grid>
            <div>
                <label class="uk-form-label" for="name"><?= ucwords($this->lang->line('name')); ?></label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small" id="name" type="text" name="name" value="<?= $user->name; ?>" placeholder="Name..." required autofocus>
                </div>
                <?= form_error('name', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
            <div>
                <label class="uk-form-label" for="username"><?= ucwords($this->lang->line('username')); ?></label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small" id="username" type="text" name="username" value="<?= $user->username; ?>" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-grid-small uk-child-width-expand@m" uk-grid>
            <div>
                <label class="uk-form-label" for="old_password"><?= ucwords($this->lang->line('old_password')); ?></label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small <?= form_error('old_password') ? 'uk-form-danger' : '' ?>" id="old_password" type="password" name="old_password" placeholder="<?= ucwords($this->lang->line('old_password')); ?>..." required>
                </div>
                <?= form_error('old_password', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
            <div>
                <label class="uk-form-label" for="new_password"><?= ucwords($this->lang->line('new_password')); ?></label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small <?= form_error('new_password') ? 'uk-form-danger' : '' ?>" id="new_password" type="password" name="new_password" placeholder="<?= ucwords($this->lang->line('new_password')); ?>..." required>
                </div>
                <?= form_error('new_password', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
            <div>
                <label class="uk-form-label" for="update"><?= ucwords($this->lang->line('password_confirmation')); ?></label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small <?= form_error('password_confirmation') ? 'uk-form-danger' : '' ?>" id="password_confirmation" type="password" name="password_confirmation" placeholder="<?= ucwords($this->lang->line('password_confirmation')); ?>..." required>
                </div>
                <?= form_error('password_confirmation', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="uk-margin">
        <div class="uk-flex uk-flex-center">
            <div>
                <button class="uk-button uk-button-primary" type="submit"><?= ucwords($this->lang->line('update')); ?></button>
            </div>
        </div>
    </div>
</form>