<div class="uk-flex uk-flex-middle uk-flex-between">
    <h2 class="uk-heading-small uk-margin-remove"><?= ucwords($this->lang->line('blogs')); ?></h2>
    <div>
        <a href="<?= base_url('admin/blog/form'); ?>" class="uk-button uk-button-default uk-button-small"><span uk-icon="icon: plus-circle"></span> <?= ucwords($this->lang->line('create') . " " . $this->lang->line('blog')); ?></a>
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
            <?php foreach ($blogs['data'] as $blog) : ?>
                <tr>
                    <td><?= $blog->title; ?></td>
                    <td><?= $blog->updated_by; ?></td>
                    <td><?= $blog->created_at; ?></td>
                    <td class="uk-text-center uk-table-shrink"><?= $blog->is_publish ? ucwords($this->lang->line('yes')) : ucwords($this->lang->line('no')); ?></td>
                    <td class="uk-text-center">
                        <div>
                            <a href="#" class="uk-link-text"><span uk-icon="icon: more-vertical"></span></a>
                            <div uk-dropdown="mode: click">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="<?= base_url('admin/blog/change_publish/' . $blog->id); ?>" onclick="return confirm('<?= ucfirst($this->lang->line('publish_prompt')); ?>')"><span uk-icon="icon: info"></span> <?= ucwords($this->lang->line('edit') . " " . $this->lang->line('publish')); ?></a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="<?= base_url('admin/blog/form/' . $blog->id) ?>"><span uk-icon="icon: pencil"></span> <?= ucwords($this->lang->line('edit')); ?></a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="<?= base_url('admin/blog/delete/' . $blog->id); ?>" onclick="return confirm('<?= ucfirst($this->lang->line('delete_prompt')); ?>')"><span uk-icon="icon: trash"></span> <?= ucwords($this->lang->line('delete')); ?></a></li>
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
    <li class="<?= $blogs['prev_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $blogs['prev_page'] ? (base_url('admin/blog?page=') . $blogs['prev_page']) : '#'; ?>"><span uk-pagination-previous></span> <?= ucfirst($this->lang->line('previous')); ?></a></li>
    <?php for ($i = 1; $i <= $blogs['total_pages']; $i++) : ?>
        <li class="<?= $blogs['current_page'] == $i ? 'uk-active' : ''; ?>"><a href="<?= base_url('admin/blog?page=') . $i; ?>"><?= $i; ?></a></li>
    <?php endfor; ?>
    <li class="<?= $blogs['next_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $blogs['next_page'] ? (base_url('admin/blog?page=') . $blogs['next_page']) : '#'; ?>"><?= ucfirst($this->lang->line('next')); ?> <span uk-pagination-next></span></a></li>
</ul>