<?php if ($action == 'add') : ?>
    <div class="col-md-6">
        <!-- add Category -->
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h4 class="fw-semibold text-uppercase">Add Category</h4>
        </div>
        <form method="post" enctype="multipart/form-data">
            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger">Please fix the errors below</div>
            <?php endif; ?>
            <div class="form-floating">
                <input value="<?= old_value('category') ?>" name="category" type="text" class="form-control mb-2" id="floatingInput" placeholder="Category">
                <label for="floatingInput">Enter Category Name</label>
            </div>
            <?php if (!empty($errors['category'])) : ?>
                <div class="text-danger"><?= $errors['category'] ?></div>
            <?php endif; ?>
            <div class="form-floating my-3">
                <select name="disabled" class="form-select">
                    <option value="0">Yes</option>
                    <option value="1">No</option>
                </select>
                <label for="floatingInput">Active</label>
            </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <a href="<?= ROOT ?>/admin/categories">
                    <button class="btn btn-dark py-2 px-3" type="button">Back</button>
                </a>
                <button class="btn btn-dark py-2" type="submit">Create Category</button>
            </div>
        </form>
    </div>
<?php elseif ($action == 'edit') : ?>
    <div class="col-md-6">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h4 class="fw-semibold text-uppercase">Edit Category</h4>
        </div>
        <form method="post" enctype="multipart/form-data">
            <?php if (!empty($row)) : ?>

                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">Please fix the errors below</div>
                <?php endif; ?>
                <div class="form-floating">
                    <input value="<?= old_value('category', $row['category']) ?>" name="category" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <?php if (!empty($errors['category'])) : ?>
                    <div class="text-danger"><?= $errors['category'] ?></div>
                <?php endif; ?>

                <div class="form-floating my-3">
                    <select name="disabled" class="form-select">
                        <option <?= old_select('disabled', '0', $row['disabled']) ?> value="0">Yes</option>
                        <option <?= old_select('disabled', '1', $row['disabled']) ?> value="1">No</option>
                    </select>
                    <label for="floatingInput">Active</label>
                </div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <a href="<?= ROOT ?>/admin/categories">
                        <button class="btn btn-dark py-2 px-3" type="button">Back</button>
                    </a>
                    <button class="btn btn-dark py-2" type="submit">Edit Category</button>
                </div>
            <?php else : ?>
                <div class="alert alert-danger text-center">Record not found!</div>
            <?php endif; ?>
        </form>
    </div>


<?php elseif ($action == 'delete') : ?>

    <div class="col-md-6">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h4 class="fw-semibold text-uppercase">Delete Category</h4>
        </div>
        <form method="post">

            <?php if (!empty($row)) : ?>

                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">Please fix the errors below</div>
                <?php endif; ?>
                <div class="alert alert-danger">Are you sure to delete this user?</div>
                <div class="form-floating">
                    <div class="form-control mb-2"><?= old_value('category', $row['category']) ?></div>
                </div>
                <?php if (!empty($errors['category'])) : ?>
                    <div class="text-danger"><?= $errors['category'] ?></div>
                <?php endif; ?>

                <div class="form-floating">
                    <div class="form-control mb-2"><?= old_value('slug', $row['slug']) ?></div>
                </div>
                <?php if (!empty($errors['slug'])) : ?>
                    <div class="text-danger"><?= $errors['slug'] ?></div>
                <?php endif; ?>


                <a href="<?= ROOT ?>/admin/categories">
                    <button class="mt-4 btn btn-lg btn-dark" type="button">Cancel</button>
                </a>
                <button class="mt-4 btn btn-lg btn-danger  float-end" type="submit">Delete</button>
            <?php else : ?>

                <div class="alert alert-danger text-center">Record not found!</div>
            <?php endif; ?>

        </form>
    </div>

<?php else : ?>
    <!-- Categories table -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h4 class="fw-semibold text-uppercase">All Categories</h4>
        <a href="<?= ROOT ?>/admin/categories/add">
            <button class="btn-dark rounded py-2 px-3"> <i class="bi bi-tags fs-6"></i> Add Category</button>
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Slug</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
            <?php
            $limit = 10;
            $offset = ($PAGE['page_number'] - 1) * $limit;

            $query = "select * from categories order by id desc limit $limit offset $offset";
            $rows = query($query);
            ?>

        </thead>
        <tbody>
            <?php if (!empty($rows)) : ?>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['category'] ?></td>
                        <td><?= $row['slug'] ?></td>
                        <td><?= $row['disabled'] ? 'No' : 'Yes' ?></td>
                        <td>
                            <a href="<?= ROOT ?>/admin/categories/edit/<?= $row['id'] ?>">
                                <button class="btn btn-warning text-white btn-sm"><i class="bi bi-pencil-square"></i></button>
                            </a>
                            <a href="<?= ROOT ?>/admin/categories/delete/<?= $row['id'] ?>">
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="mb-4 float-end">
        <a href="<?= $PAGE['prev_link'] ?>">
            <button class="btn btn-dark">Previous</button>
        </a>
        <a href="<?= $PAGE['next_link'] ?>">
            <button class="btn btn-dark">Next</button>
        </a>
    </div>

<?php endif; ?>