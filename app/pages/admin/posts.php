<?php if ($action == 'add') : ?>

    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/summernote/summernote-lite.min.css">

    <div class="col-md-12 mx-auto mb-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h4 class="fw-semibold text-uppercase">Create Post</h4>
            <a href="<?= ROOT ?>/admin/posts">
                <button class="btn-dark rounded py-2 px-3">Back</button>
            </a>
        </div>
        <form method="post" enctype="multipart/form-data">
            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger">Please fix the errors below</div>
            <?php endif; ?>

            <div class="my-2">
                Featured Image<br>
                <label class="d-block my-2">
                    <img class="d-block image-preview-edit" src="<?= get_image('') ?>" style="cursor: pointer;width: 250px;height: 150px;object-fit: cover;">
                    <input onchange="display_image_edit(this.files[0])" type="file" name="image" class="d-none">
                </label>
                <?php if (!empty($errors['image'])) : ?>
                    <div class="text-danger"><?= $errors['image'] ?></div>
                <?php endif; ?>

                <script>
                    function display_image_edit(file) {
                        document.querySelector(".image-preview-edit").src = URL.createObjectURL(file);
                    }
                </script>
            </div>
            <div class="form-floating">
                <input value="<?= old_value('title') ?>" name="title" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username">
                <label for="floatingInput">Title</label>
            </div>
            <?php if (!empty($errors['title'])) : ?>
                <div class="text-danger"><?= $errors['title'] ?></div>
            <?php endif; ?>

            <div class="form-floating my-3">
                <select name="category_id" class="form-select">

                    <?php
                    $query = "select * from categories order by id desc";
                    $categories = query($query);
                    ?>
                    <option value="">--Select--</option>
                    <?php if (!empty($categories)) : ?>
                        <?php foreach ($categories as $cat) : ?>
                            <option <?= old_select('category_id', $cat['id']) ?> value="<?= $cat['id'] ?>"><?= $cat['category'] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </select>
                <label for="floatingInput">Category</label>
            </div>
            <?php if (!empty($errors['category'])) : ?>
                <div class="text-danger"><?= $errors['category'] ?></div>
            <?php endif; ?>

            <div class="mb-2">
                <textarea id="summernote" rows="8" name="content" id="floatingInput" placeholder="Post content" type="content" class="form-control"><?= old_value('content') ?></textarea>
            </div>
            <?php if (!empty($errors['content'])) : ?>
                <div class="text-danger"><?= $errors['content'] ?></div>
            <?php endif; ?>

            <button class="mt-2 w-100 btn btn-dark" type="submit">Create</button>
        </form>
    </div>

    <script src="<?= ROOT ?>/assets/js/jquery.js"></script>
    <script src="<?= ROOT ?>/assets/summernote/summernote-lite.min.js"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Post content',
            tabsize: 2,
            height: 400
        });
    </script>

<?php elseif ($action == 'edit') : ?>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/summernote/summernote-lite.min.css">
    <div class="col-md-12 mx-auto mb-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h4 class="fw-semibold text-uppercase">Edit Post</h4>
            <a href="<?= ROOT ?>/admin/posts">
                <button class="btn-dark rounded py-2 px-3">Back</button>
            </a>
        </div>
        <form method="post" enctype="multipart/form-data">

            <?php if (!empty($row)) : ?>

                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">Please fix the errors below</div>
                <?php endif; ?>

                <div class="my-2">
                    <label class="d-block">
                        <img class="d-block image-preview-edit rounded" src="<?= get_image($row['image']) ?>" style="cursor: pointer;width: 250px;height: 150px;object-fit: cover;">
                        <input onchange="display_image_edit(this.files[0])" type="file" name="image" class="d-none">
                    </label>
                    <?php if (!empty($errors['image'])) : ?>
                        <div class="text-danger"><?= $errors['image'] ?></div>
                    <?php endif; ?>

                    <script>
                        function display_image_edit(file) {
                            document.querySelector(".image-preview-edit").src = URL.createObjectURL(file);
                        }
                    </script>
                </div>

                <div class="form-floating">
                    <input value="<?= old_value('title', $row['title']) ?>" name="title" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username">
                    <label for="floatingInput">Title</label>
                </div>
                <?php if (!empty($errors['title'])) : ?>
                    <div class="text-danger"><?= $errors['title'] ?></div>
                <?php endif; ?>

                <div class="form-floating my-3">
                    <select name="category_id" class="form-select">
                        <?php
                        $query = "select * from categories order by id desc";
                        $categories = query($query);
                        ?>
                        <option value="">--Select--</option>
                        <?php if (!empty($categories)) : ?>
                            <?php foreach ($categories as $cat) : ?>
                                <option <?= old_select('category_id', $cat['id'], $row['category_id']) ?> value="<?= $cat['id'] ?>"><?= $cat['category'] ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </select>
                    <label for="floatingInput">Category</label>
                </div>
                <?php if (!empty($errors['category'])) : ?>
                    <div class="text-danger"><?= $errors['category'] ?></div>
                <?php endif; ?>

                <div class="">
                    <textarea id="summernote" rows="8" name="content" id="floatingInput" placeholder="Post content" type="content" class="form-control"><?= old_value('content', add_root_to_images($row['content'])) ?></textarea>
                </div>
                <?php if (!empty($errors['content'])) : ?>
                    <div class="text-danger"><?= $errors['content'] ?></div>
                <?php endif; ?>
                <button class="mt-2 w-100 btn btn-dark" type="submit">Edit</button>
            <?php else : ?>

                <div class="alert alert-danger text-center">Record not found!</div>
            <?php endif; ?>

        </form>
    </div>

    <script src="<?= ROOT ?>/assets/js/jquery.js"></script>
    <script src="<?= ROOT ?>/assets/summernote/summernote-lite.min.js"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Post content',
            tabsize: 2,
            height: 400
        });
    </script>

<?php elseif ($action == 'delete') : ?>

    <div class="col-md-6">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h4 class="fw-semibold text-uppercase">Delete Post</h4>
        </div>
        <form method="post">
            <?php if (!empty($row)) : ?>

                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">Please fix the errors below</div>
                <?php endif; ?>
                <div class="alert alert-danger">Are you sure to delete this Post?</div>
                <div class="form-floating">
                    <div class="form-control mb-2"><?= old_value('title', $row['title']) ?></div>
                </div>
                <?php if (!empty($errors['title'])) : ?>
                    <div class="text-danger"><?= $errors['title'] ?></div>
                <?php endif; ?>

                <div class="form-floating">
                    <div class="form-control mb-2"><?= old_value('slug', $row['slug']) ?></div>
                </div>
                <?php if (!empty($errors['slug'])) : ?>
                    <div class="text-danger"><?= $errors['slug'] ?></div>
                <?php endif; ?>


                <a href="<?= ROOT ?>/admin/posts">
                    <button class="mt-4 btn btn-lg btn-dark" type="button">Back</button>
                </a>
                <button class="mt-4 btn btn-lg btn-danger  float-end" type="submit">Delete</button>
            <?php else : ?>

                <div class="alert alert-danger text-center">Record not found!</div>
            <?php endif; ?>

        </form>
    </div>

<?php else : ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h4 class="fw-semibold text-uppercase">All Posts</h4>
        <a href="<?= ROOT ?>/admin/posts/add">
            <button class="btn-dark rounded py-2 px-3"> <i class="bi bi-tags fs-6"></i> Add Posts</button>
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">

            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Slug</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php
            $limit = 10;
            $offset = ($PAGE['page_number'] - 1) * $limit;

            //  $query = "select * from posts order by id desc limit $limit offset $offset";
            $query = "select posts.*,categories.category from posts join categories on posts.category_id = categories.id order by id desc limit 6";
            $rows = query($query);
            ?>

            <?php if (!empty($rows)) : ?>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td>
                            <img src="<?= get_image($row['image']) ?>" style="width: 50px;height: 50px;object-fit: cover;">
                        </td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['category'] ?? 'Unknown' ?></td>
                        <td><?= $row['slug'] ?></td>
                        <td><?= date("jS M, Y", strtotime($row['date'])) ?></td>
                        <td>
                            <a href="<?= ROOT ?>/admin/posts/edit/<?= $row['id'] ?>">
                                <button class="btn btn-dark text-white btn-sm"><i class="bi bi-pencil-square"></i></button>
                            </a>
                            <a href="<?= ROOT ?>/admin/posts/delete/<?= $row['id'] ?>">
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>

        <div class="mb-4 float-end">
            <a href="<?= $PAGE['prev_link'] ?>">
                <button class="btn btn-dark">Previous</button>
            </a>
            <a href="<?= $PAGE['next_link'] ?>">
                <button class="btn btn-dark">Next</button>
            </a>
        </div>

    </div>

<?php endif; ?>