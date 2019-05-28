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
            <input type="hidden" name="id" value="<?= isset($user) ? $user->id : ''; ?>">
            <input class="uk-input uk-form-small <?= form_error('name') ? 'uk-form-danger' : '' ?>" id="name" type="text" name="name" value="<?= isset($user) ? $user->name : set_value('name'); ?>" placeholder="Name..." required autofocus>
        </div>
        <?= form_error('name', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
    </div>
    <div class="uk-margin">
        <div class="uk-grid-small uk-child-width-expand@m" uk-grid>
            <div>
                <label class="uk-form-label" for="username">Username</label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small <?= form_error('username') ? 'uk-form-danger' : '' ?>" id="username" type="text" name="username" value="<?= isset($user) ? $user->username : set_value('username'); ?>" placeholder="Username..." required>
                </div>
                <?= form_error('username', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
            <div>
                <label class="uk-form-label" for="role">Role</label>
                <div class="uk-form-controls">
                    <select class="uk-select uk-form-small <?= form_error('role') ? 'uk-form-danger' : '' ?>" id="role" name="role" required>
                        <option value="" hidden selected>Role...</option>
                        <?php foreach ($roles as $role) : ?>
                            <?php if ($role->id === $user->role_id) : ?>
                                <option value="<?= $role->id; ?>" selected><?= ucwords($role->name); ?></option>
                            <?php else : ?>
                                <option value="<?= $role->id; ?>"><?= ucwords($role->name); ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?= form_error('role', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <?php if (isset($user)) : ?>
            <div class="uk-margin-small-bottom">
                <small class="uk-text-danger">* Left blank if you won't change your password</small>
            </div>
        <?php endif; ?>
        <div class="uk-grid-small uk-child-width-expand@m" uk-grid>
            <div>
                <label class="uk-form-label" for="password">Password</label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small <?= form_error('password') ? 'uk-form-danger' : '' ?>" id="password" type="password" name="password" value="<?= set_value('password'); ?>" placeholder="Password..." <?= isset($user) ? '' : 'required'; ?>>
                </div>
                <?= form_error('password', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
            <div>
                <label class="uk-form-label" for="password_confirmation">Password Confirmation</label>
                <div class="uk-form-controls">
                    <input class="uk-input uk-form-small <?= form_error('password_confirmation') ? 'uk-form-danger' : '' ?>" id="password_confirmation" type="password" name="password_confirmation" value="<?= set_value('password_confirmation'); ?>" placeholder="Password Confirmation..." <?= isset($user) ? '' : 'required'; ?>>
                </div>
                <?= form_error('password_confirmation', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="active">Active</label>
        <div class="uk-grid-small" uk-grid>
            <label><input class="uk-radio" id="active" type="radio" name="active" value="1" <?= isset($user) && $user->is_active == 1 ? 'checked' : '' ?> required> Yes</label><br>
            <label><input class="uk-radio" type="radio" name="active" value="0" <?= isset($user) && $user->is_active == 0 ? 'checked' : '' ?>> No</label>
        </div>
    </div>
    <hr>
    <div class="uk-margin">
        <div class="uk-flex uk-flex-center">
            <div>
                <button class="uk-button uk-button-primary" type="submit"><?= isset($user) ? 'Update' : 'Save'; ?></button>
            </div>
            <?php if (!isset($user)) : ?>
                <div class="uk-margin-small-left">
                    <button class="uk-button uk-button-default" type="reset">Reset</button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</form>