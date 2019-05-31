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
                <label class="uk-form-label" for="name">Name</label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small" id="name" type="text" name="name" value="<?= $user->name; ?>" placeholder="Name..." required autofocus>
                </div>
                <?= form_error('name', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
            <div>
                <label class="uk-form-label" for="username">Username</label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small" id="username" type="text" name="username" value="<?= $user->username; ?>" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-grid-small uk-child-width-expand@m" uk-grid>
            <div>
                <label class="uk-form-label" for="old_password">Old Password</label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small <?= form_error('old_password') ? 'uk-form-danger' : '' ?>" id="old_password" type="password" name="old_password" placeholder="Old Password..." required>
                </div>
                <?= form_error('old_password', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
            <div>
                <label class="uk-form-label" for="new_password">New Password</label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small <?= form_error('new_password') ? 'uk-form-danger' : '' ?>" id="new_password" type="password" name="new_password" placeholder="New Password..." required>
                </div>
                <?= form_error('new_password', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
            <div>
                <label class="uk-form-label" for="password_confirmation">Password Confirmation</label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small <?= form_error('password_confirmation') ? 'uk-form-danger' : '' ?>" id="password_confirmation" type="password" name="password_confirmation" placeholder="Password Confirmation..." required>
                </div>
                <?= form_error('password_confirmation', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="uk-margin">
        <div class="uk-flex uk-flex-center">
            <div>
                <button class="uk-button uk-button-primary" type="submit">Update</button>
            </div>
        </div>
    </div>
</form>