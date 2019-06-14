<div class="uk-flex uk-flex-middle uk-flex-between">
    <h2 class="uk-heading-small uk-margin-remove"><?= ucwords($this->lang->line('videos')); ?></h2>
    <div>
        <a href="<?= base_url('admin/video/form'); ?>" class="uk-button uk-button-default uk-button-small"><span uk-icon="icon: plus-circle"></span> <?= ucwords($this->lang->line('add') . ' ' . $this->lang->line('video')); ?></a>
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
                <th><?= $this->lang->line('title'); ?></th>
                <th><?= $this->lang->line('updated') . " " . $this->lang->line('by'); ?></th>
                <th><?= $this->lang->line('publish_at'); ?></th>
                <th><?= $this->lang->line('published'); ?></th>
                <th class="uk-text-center uk-table-shrink"><?= $this->lang->line('action'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($videos['data'] as $video) : ?>
                <tr>
                    <td><?= $video->title; ?></td>
                    <td><?= $video->updated_by; ?></td>
                    <td><?= $video->created_at; ?></td>
                    <td class="uk-text-center uk-table-shrink"><?= $video->is_publish ? ucwords($this->lang->line('yes')) : ucwords($this->lang->line('no')); ?></td>
                    <td class="uk-text-center">
                        <div>
                            <a href="#" class="uk-link-text"><span uk-icon="icon: more-vertical"></span></a>
                            <div uk-dropdown="mode: click">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="<?= base_url('admin/video/change_publish/' . $video->id); ?>" onclick="return confirm('<?= ucfirst($this->lang->line('publish_prompt')); ?>')"><span uk-icon="icon: info"></span> <?= ucwords($this->lang->line('edit') . " " . $this->lang->line('publish')); ?></a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="<?= base_url('admin/video/form/' . $video->id) ?>"><span uk-icon="icon: pencil"></span> <?= ucwords($this->lang->line('edit')); ?></a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="<?= base_url('admin/video/delete/' . $video->id); ?>" onclick="return confirm('<?= ucwords($this->lang->line('delete_prompt')); ?>')"><span uk-icon="icon: trash"></span> <?= ucwords($this->lang->line('delete')); ?></a></li>
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
    <li class="<?= $videos['prev_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $videos['prev_page'] ? (base_url('admin/video?page=') . $videos['prev_page']) : '#'; ?>"><span uk-pagination-previous></span> <?= ucfirst($this->lang->line('previous')); ?></a></li>
    <?php for ($i = 1; $i <= $videos['total_pages']; $i++) : ?>
        <li class="<?= $videos['current_page'] == $i ? 'uk-active' : ''; ?>"><a href="<?= base_url('admin/video?page=') . $i; ?>"><?= $i; ?></a></li>
    <?php endfor; ?>
    <li class="<?= $videos['next_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $videos['next_page'] ? (base_url('admin/video?page=') . $videos['next_page']) : '#'; ?>"><?= ucfirst($this->lang->line('next')); ?> <span uk-pagination-next></span></a></li>
</ul>