<div class="uk-flex uk-flex-middle uk-flex-between">
    <h2 class="uk-heading-small uk-margin-remove">Teams</h2>
    <div>
        <a href="<?= base_url('admin/team/form'); ?>" class="uk-button uk-button-default uk-button-small"><span uk-icon="icon: plus-circle"></span> Create Team</a>
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
                <th>Title</th>
                <th>Updated By</th>
                <th class="uk-text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teams['data'] as $team) : ?>
                <tr>
                    <td><?= $team->title; ?></td>
                    <td><?= $team->updated_by; ?></td>
                    <td class="uk-text-center">
                        <div>
                            <a href="#" class="uk-link-text"><span uk-icon="icon: more-vertical"></span></a>
                            <div uk-dropdown="mode: click">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="<?= base_url('admin/team/form/' . $team->id) ?>"><span uk-icon="icon: pencil"></span> Edit</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="<?= base_url('admin/team/delete/' . $team->id); ?>" onclick="return confirm('Are you sure to remove this team?')"><span uk-icon="icon: trash"></span> Delete</a></li>
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
    <li class="<?= $teams['prev_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $teams['prev_page'] ? (base_url('admin/team?page=') . $teams['prev_page']) : '#'; ?>"><span uk-pagination-previous></span></a></li>
    <?php for ($i = 1; $i <= $teams['total_pages']; $i++) : ?>
        <li class="<?= $teams['current_page'] == $i ? 'uk-active' : ''; ?>"><a href="<?= base_url('admin/team?page=') . $i; ?>"><?= $i; ?></a></li>
    <?php endfor; ?>
    <li class="<?= $teams['next_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $teams['next_page'] ? (base_url('admin/team?page=') . $teams['next_page']) : '#'; ?>"><span uk-pagination-next></span></a></li>
</ul>