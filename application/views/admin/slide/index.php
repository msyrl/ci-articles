<div class="uk-flex uk-flex-middle uk-flex-between">
    <h2 class="uk-heading-small uk-margin-remove">Slides</h2>
    <div>
        <a href="<?= base_url('admin/slide/form'); ?>" class="uk-button uk-button-default uk-button-small"><span uk-icon="icon: plus-circle"></span> Create Slide</a>
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
                <th>Publish Date</th>
                <th>Published</th>
                <th class="uk-text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($slides['data'] as $slide) : ?>
                <tr>
                    <td><?= $slide->title; ?></td>
                    <td><?= $slide->updated_by; ?></td>
                    <td><?= $slide->created_at; ?></td>
                    <td class="uk-text-center uk-table-shrink"><?= $slide->is_publish ? 'Yes' : 'No'; ?></td>
                    <td class="uk-text-center">
                        <div>
                            <a href="#" class="uk-link-text"><span uk-icon="icon: more-vertical"></span></a>
                            <div uk-dropdown="mode: click">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="<?= base_url('admin/slide/change_publish/' . $slide->id); ?>" onclick="return confirm('Are you sure to change publish option?')"><span uk-icon="icon: info"></span> Publish</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="<?= base_url('admin/slide/form/' . $slide->id) ?>"><span uk-icon="icon: pencil"></span> Edit</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="<?= base_url('admin/slide/delete/' . $slide->id); ?>" onclick="return confirm('Are you sure to remove this slide?')"><span uk-icon="icon: trash"></span> Delete</a></li>
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
    <li class="<?= $slides['prev_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $slides['prev_page'] ? (base_url('admin/slide?page=') . $slides['prev_page']) : '#'; ?>"><span uk-pagination-previous></span></a></li>
    <?php for ($i = 1; $i <= $slides['total_pages']; $i++) : ?>
        <li class="<?= $slides['current_page'] == $i ? 'uk-active' : ''; ?>"><a href="<?= base_url('admin/slide?page=') . $i; ?>"><?= $i; ?></a></li>
    <?php endfor; ?>
    <li class="<?= $slides['next_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $slides['next_page'] ? (base_url('admin/slide?page=') . $slides['next_page']) : '#'; ?>"><span uk-pagination-next></span></a></li>
</ul>