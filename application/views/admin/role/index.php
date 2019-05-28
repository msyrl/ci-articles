<div class="uk-flex uk-flex-middle uk-flex-between">
    <h2 class="uk-heading-small uk-margin-remove">Roles</h2>
    <div>
        <a href="<?= base_url('admin/role/form'); ?>" class="uk-button uk-button-default uk-button-small"><span uk-icon="icon: plus-circle"></span> Create Role</a>
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
                <th>Name</th>
                <th class="uk-text-center uk-table-shrink">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles['data'] as $role) : ?>
                <tr>
                    <td><?= $role->name; ?></td>
                    <td class="uk-text-center">
                        <div>
                            <a href="#" class="uk-link-text"><span uk-icon="icon: more-vertical"></span></a>
                            <div uk-dropdown="mode: click">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="<?= base_url('admin/role/form/' . $role->id) ?>"><span uk-icon="icon: pencil"></span> Edit</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="<?= base_url('admin/role/delete/' . $role->id); ?>" onclick="return confirm('Are you sure to remove this role?')"><span uk-icon="icon: trash"></span> Delete</a></li>
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
    <li class="<?= $roles['prev_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $roles['prev_page'] ? (base_url('admin/role?page=') . $roles['prev_page']) : '#'; ?>"><span uk-pagination-previous></span></a></li>
    <?php for ($i = 1; $i <= $roles['total_pages']; $i++) : ?>
        <li class="<?= $roles['current_page'] == $i ? 'uk-active' : ''; ?>"><a href="<?= base_url('admin/role?page=') . $i; ?>"><?= $i; ?></a></li>
    <?php endfor; ?>
    <li class="<?= $roles['next_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $roles['next_page'] ? (base_url('admin/role?page=') . $roles['next_page']) : '#'; ?>"><span uk-pagination-next></span></a></li>
</ul>