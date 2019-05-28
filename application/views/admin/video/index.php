<div class="uk-flex uk-flex-middle uk-flex-between">
    <h2 class="uk-heading-small uk-margin-remove">Videos</h2>
    <div>
        <a href="<?= base_url('admin/video/form'); ?>" class="uk-button uk-button-default uk-button-small"><span uk-icon="icon: plus-circle"></span> Create Video</a>
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
                <th>Link</th>
                <th>Updated By</th>
                <th>Published</th>
                <th class="uk-text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($videos['data'] as $video) : ?>
                <tr>
                    <td><?= $video->title; ?></td>
                    <td><?= $video->link; ?></td>
                    <td><?= $video->updated_by; ?></td>
                    <td class="uk-text-center uk-table-shrink"><?= $video->is_publish ? 'Yes' : 'No'; ?></td>
                    <td class="uk-text-center">
                        <div>
                            <a href="#" class="uk-link-text"><span uk-icon="icon: more-vertical"></span></a>
                            <div uk-dropdown="mode: click">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="<?= base_url('admin/video/change_publish/' . $video->id); ?>" onclick="return confirm('Are you sure to change publish option?')"><span uk-icon="icon: info"></span> Publish</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="<?= base_url('admin/video/form/' . $video->id) ?>"><span uk-icon="icon: pencil"></span> Edit</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="<?= base_url('admin/video/delete/' . $video->id); ?>" onclick="return confirm('Are you sure to remove this video?')"><span uk-icon="icon: trash"></span> Delete</a></li>
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
    <li class="<?= $videos['prev_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $videos['prev_page'] ? (base_url('admin/video?page=') . $videos['prev_page']) : '#'; ?>"><span uk-pagination-previous></span></a></li>
    <?php for ($i = 1; $i <= $videos['total_pages']; $i++) : ?>
        <li class="<?= $videos['current_page'] == $i ? 'uk-active' : ''; ?>"><a href="<?= base_url('admin/video?page=') . $i; ?>"><?= $i; ?></a></li>
    <?php endfor; ?>
    <li class="<?= $videos['next_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $videos['next_page'] ? (base_url('admin/video?page=') . $videos['next_page']) : '#'; ?>"><span uk-pagination-next></span></a></li>
</ul>