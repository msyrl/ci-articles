<div class="uk-flex uk-flex-middle uk-flex-between">
    <h2 class="uk-heading-small uk-margin-remove">Blogs</h2>
    <div>
        <a href="<?= base_url('admin/blog/form'); ?>" class="uk-button uk-button-default uk-button-small"><span uk-icon="icon: plus-circle"></span> Create Blog</a>
    </div>
</div>
<hr>
<?php if ($this->session->flashdata('form_status') !== NULL) : ?>
    <div class="uk-alert-<?= $this->session->flashdata('form_status')['status']; ?>" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p><?= $this->session->flashdata('form_status')['message']; ?></p>
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
            <?php foreach ($blogs as $blog) : ?>
                <tr>
                    <td><?= $blog->title; ?></td>
                    <td><?= $blog->updated_by; ?></td>
                    <td><?= $blog->created_at; ?></td>
                    <td class="uk-text-center uk-table-shrink"><?= $blog->is_publish; ?></td>
                    <td class="uk-text-center">
                        <div>
                            <a href="#" class="uk-link-text"><span uk-icon="icon: more-vertical"></span></a>
                            <div uk-dropdown>
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="<?= base_url('admin/blog/change_publish/' . $blog->id); ?>" onclick="return confirm('Are you sure to change publish option?')"><span uk-icon="icon: info"></span> Publish</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="<?= base_url('admin/blog/form/' . $blog->id) ?>"><span uk-icon="icon: pencil"></span> Edit</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="<?= base_url('admin/blog/delete/' . $blog->id); ?>" onclick="return confirm('Are you sure to remove this blog?')"><span uk-icon="icon: trash"></span> Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <ul class="uk-pagination uk-flex-right">
        <li><a href="#"><span uk-pagination-previous></span></a></li>
        <li><a href="#">1</a></li>
        <li class="uk-disabled"><span>...</span></li>
        <li><a href="#">5</a></li>
        <li><a href="#">6</a></li>
        <li class="uk-active"><span>7</span></li>
        <li><a href="#">8</a></li>
        <li><a href="#"><span uk-pagination-next></span></a></li>
    </ul>
</div>