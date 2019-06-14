<div class="uk-flex uk-flex-middle uk-flex-between">
    <h2 class="uk-heading-small uk-margin-remove"><?= ucwords($title); ?></h2>
    <div>
        <a href="<?= base_url('admin/book/form'); ?>" class="uk-button uk-button-default uk-button-small"><span uk-icon="icon: plus-circle"></span> <?= ucwords($this->lang->line('add') . ' ' . $this->lang->line('book')); ?></a>
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
            <?php if (!empty($books)) : ?>
                <?php foreach ($books['data'] as $book) : ?>
                    <tr>
                        <td><?= $book->title; ?></td>
                        <td><?= $book->updated_by; ?></td>
                        <td><?= $book->created_at; ?></td>
                        <td class="uk-text-center uk-table-shrink"><?= $book->is_publish ? ucwords($this->lang->line('yes')) : ucwords($this->lang->line('no')); ?></td>
                        <td class="uk-text-center">
                            <div>
                                <a href="#" class="uk-link-text"><span uk-icon="icon: more-vertical"></span></a>
                                <div uk-dropdown="mode: click">
                                    <ul class="uk-nav uk-dropdown-nav">
                                        <li><a href="<?= base_url('admin/book/change_publish/' . $book->id); ?>" onclick="return confirm('<?= ucfirst($this->lang->line('publish_prompt')); ?>')"><span uk-icon="icon: info"></span> <?= ucwords($this->lang->line('edit') . " " . $this->lang->line('publish')); ?></a></li>
                                        <li class="uk-nav-divider"></li>
                                        <li><a href="<?= base_url('admin/book/form/' . $book->id) ?>"><span uk-icon="icon: pencil"></span> <?= ucwords($this->lang->line('edit')); ?></a></li>
                                        <li class="uk-nav-divider"></li>
                                        <li><a href="<?= base_url('admin/book/delete/' . $book->id); ?>" onclick="return confirm('<?= ucfirst($this->lang->line('delete_prompt')); ?>')"><span uk-icon="icon: trash"></span> <?= ucwords($this->lang->line('delete')); ?></a></li>
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
        <li class="<?= $books['prev_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $books['prev_page'] ? (base_url('admin/book?page=') . $books['prev_page']) : '#'; ?>"><span uk-pagination-previous></span> <?= ucfirst($this->lang->line('previous')); ?></a></li>
        <?php for ($i = 1; $i <= $books['total_pages']; $i++) : ?>
            <li class="<?= $books['current_page'] == $i ? 'uk-active' : ''; ?>"><a href="<?= base_url('admin/book?page=') . $i; ?>"><?= $i; ?></a></li>
        <?php endfor; ?>
        <li class="<?= $books['next_page'] ? '' : 'uk-disabled'; ?>"><a href="<?= $books['next_page'] ? (base_url('admin/book?page=') . $books['next_page']) : '#'; ?>"><?= ucfirst($this->lang->line('next')); ?> <span uk-pagination-next></span></a></li>
    </ul>
<?php endif; ?>