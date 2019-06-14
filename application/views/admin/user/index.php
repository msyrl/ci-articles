<div class="uk-flex uk-flex-middle uk-flex-between">
    <h2 class="uk-heading-small uk-margin-remove"><?= ucwords($title); ?></h2>
    <div>
        <a href="<?= base_url('admin/user/form'); ?>" class="uk-button uk-button-default uk-button-small"><span uk-icon="icon: plus-circle"></span> <?= ucwords($this->lang->line('add') . ' ' . $this->lang->line('user')); ?></a>
    </div>
</div>
<hr>
<?php if ($this->session->flashdata('form_status') !== NULL) : ?>
    <div class="uk-alert-<?= $this->session->flashdata('form_status')['status']; ?> uk-animation-slide-top" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <?= $this->session->flashdata('form_status')['message']; ?>
    </div>
<?php endif; ?>
<div class="uk-overflow-auto">
    <table class="uk-table uk-table-small uk-table-striped uk-table-middle">
        <thead>
            <tr>
                <th><?= $this->lang->line('name'); ?></th>
                <th><?= $this->lang->line('username'); ?></th>
                <th><?= $this->lang->line('role'); ?></th>
                <th><?= $this->lang->line('activated'); ?></th>
                <th class="uk-text-center uk-table-shrink"><?= $this->lang->line('action'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)) : ?>
                <?php foreach ($users['data'] as $user) : ?>
                    <tr>
                        <td><?= $user->name; ?></td>
                        <td><?= $user->username; ?></td>
                        <td><?= $user->role; ?></td>
                        <td><?= $user->is_active ? ucwords($this->lang->line('yes')) : ucwords($this->lang->line('no')); ?></td>
                        <td class="uk-text-center">
                            <div>
                                <a href="#" class="uk-link-text"><span uk-icon="icon: more-vertical"></span></a>
                                <div uk-dropdown="mode: click">
                                    <ul class="uk-nav uk-dropdown-nav">
                                        <li><a href="<?= base_url('admin/user/change_active/' . $user->id); ?>" onclick="return confirm('<?= ucfirst($this->lang->line('active_prompt')); ?>')"><span uk-icon="icon: info"></span> <?= ucwords($this->lang->line('edit') . ' ' . $this->lang->line('active')); ?></a></li>
                                        <li class="uk-nav-divider"></li>
                                        <li><a href="<?= base_url('admin/user/form/' . $user->id) ?>"><span uk-icon="icon: pencil"></span> <?= ucwords($this->lang->line('edit')); ?></a></li>
                                        <li class="uk-nav-divider"></li>
                                        <li><a href="<?= base_url('admin/user/delete/' . $user->id); ?>" onclick="return confirm('<?= ucfirst($this->lang->line('delete_prompt')); ?>')"><span uk-icon="icon: trash"></span> <?= ucwords($this->lang->line('delete')); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <hr>
    <ul class="uk-pagination uk-flex-right">
        <li class="<?= $users['prev_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $users['prev_page'] ? (base_url('admin/user?page=') . $users['prev_page']) : '#'; ?>"><span uk-pagination-previous></span> <?= ucfirst($this->lang->line('previous')); ?></a></li>
        <?php for ($i = 1; $i <= $users['total_pages']; $i++) : ?>
            <li class="<?= $users['current_page'] == $i ? 'uk-active' : ''; ?>"><a href="<?= base_url('admin/user?page=') . $i; ?>"><?= $i; ?></a></li>
        <?php endfor; ?>
        <li class="<?= $users['next_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $users['next_page'] ? (base_url('admin/user?page=') . $users['next_page']) : '#'; ?>"><?= ucfirst($this->lang->line('next')); ?> <span uk-pagination-next></span></a></li>
    </ul>
<?php endif; ?>