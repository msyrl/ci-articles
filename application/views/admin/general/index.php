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
        <label class="uk-form-label" for="address">Address</label>
        <div class="uk-form-controls">
            <textarea class="uk-textarea uk-form-small <?= form_error('address') ? 'uk-form-danger' : '' ?>" id="address" rows="5" name="address" placeholder="Address..." required><?= isset($general) ? $general->address : set_value('address'); ?></textarea>
        </div>
        <?= form_error('address', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
    </div>
    <div class="uk-margin">
        <div class="uk-grid-small uk-child-width-1-2@m" uk-grid>
            <div>
                <label class="uk-form-label" for="facebook">Facebook</label>
                <div class="uk-form-controls">
                    <input type="text" class="uk-input uk-form-small <?= form_error('facebook') ? 'uk-form-danger' : '' ?>" id="facebook" name="facebook" placeholder="Facebook..." value="<?= isset($general) ? $general->facebook : set_value('facebook'); ?>" required>
                </div>
                <?= form_error('facebook', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
            <div>
                <label class="uk-form-label" for="instagram">Instagram</label>
                <div class="uk-form-controls">
                    <input type="text" class="uk-input uk-form-small <?= form_error('instagram') ? 'uk-form-danger' : '' ?>" id="instagram" name="instagram" placeholder="Instagram..." value="<?= isset($general) ? $general->instagram : set_value('instagram'); ?>" required>
                </div>
                <?= form_error('instagram', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
            <div>
                <label class="uk-form-label" for="twitter">Twitter</label>
                <div class="uk-form-controls">
                    <input type="text" class="uk-input uk-form-small <?= form_error('twitter') ? 'uk-form-danger' : '' ?>" id="twitter" name="twitter" placeholder="Twitter..." value="<?= isset($general) ? $general->twitter : set_value('twitter'); ?>" required>
                </div>
                <?= form_error('twitter', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
            <div>
                <label class="uk-form-label" for="youtube">Youtube</label>
                <div class="uk-form-controls">
                    <input type="text" class="uk-input uk-form-small <?= form_error('youtube') ? 'uk-form-danger' : '' ?>" id="youtube" name="youtube" placeholder="Youtube..." value="<?= isset($general) ? $general->youtube : set_value('youtube'); ?>" required>
                </div>
                <?= form_error('youtube', '<p class="uk-text-danger uk-text-small uk-margin-small-top">', '</p>'); ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="uk-margin">
        <div class="uk-flex uk-flex-center">
            <div>
                <button class="uk-button uk-button-primary" type="submit"><?= isset($general) ? 'Update' : 'Save'; ?></button>
            </div>
            <div class="uk-margin-small-left">
                <button class="uk-button uk-button-default" type="reset">Reset</button>
            </div>
        </div>
    </div>
</form>