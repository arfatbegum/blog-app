<?php if ($action == 'add') : ?>
    <div>
        <!-- add user -->
        <div class="d-flex justify-content-between mb-3">
            <h5 class="fw-bold">Enter User Information for Add User</h5>
            <a href="<?= ROOT ?>/admin/users">
                <button class="btn btn-dark py-2 px-3" type="button">Back</button>
            </a>
        </div>
        <form method="post">
            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger">Please fix the errors below</div>
            <?php endif; ?>
            <div class="mb-3">
                <label class="d-block">
                    <img class="mx-auto d-block image-preview-edit" src="<?= get_image('') ?>" style="cursor: pointer;width: 150px;height: 150px;object-fit: cover;">
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
            <div class="row">
                <div class="col">
                    <div class="form-floating">
                        <input value="<?= old_value('username') ?>" name="username" type="username" class="form-control rounded" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Username</label>
                    </div>
                    <?php if (!empty($errors['username'])) : ?>
                        <div class="text-danger mb-2"><?= $errors['username'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input value="<?= old_value('email') ?>" name="email" type="email" class="form-control rounded" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <?php if (!empty($errors['email'])) : ?>
                        <div class="text-danger mb-2"><?= $errors['email'] ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-floating my-3">
                <select name="role" class="form-select">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <label for="floatingInput">Role</label>
            </div>
            <?php if (!empty($errors['role'])) : ?>
                <div class="text-danger"><?= $errors['role'] ?></div>
            <?php endif; ?>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input value="<?= old_value('password') ?>" name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <?php if (!empty($errors['password'])) : ?>
                        <div class="text-danger mb-2"><?= $errors['password'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input value="<?= old_value('retype_password') ?>" name="retype_password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                </div>
            </div>
            <button class="btn btn-dark w-100 py-2" type="submit">Create</button>
        </form>
    </div>
<?php elseif ($action == 'edit') : ?>

<?php elseif ($action == 'delete') : ?>

<?php else : ?>
    <!-- users table -->
    <div class="d-flex justify-content-between mb-3">
        <h3 class="fw-bold">All Users</h3>
        <a href="<?= ROOT ?>/admin/users/add">
            <button class="btn-dark rounded py-2 px-3"><i class="bi bi-person-plus"></i> Add User</button>
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Image</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php
            $query = "select * from users order by id desc";
            $rows = query($query);
            ?>
        </thead>
        <tbody>
            <?php if (!empty($rows)) : ?>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['role'] ?></td>
                        <td>
                            <img src="">
                        </td>
                        <td><?= date("jS M, Y", strtotime($row['date'])) ?></td>
                        <td>
                            <a href="<?= ROOT ?>/admin/users/edit/<?= $row['id'] ?>">
                                <button class="btn btn-dark text-white btn-sm"><i class="bi bi-pencil-square"></i></button>
                            </a>
                            <a href="<?= ROOT ?>/admin/users/delete/<?= $row['id'] ?>">
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

<?php endif; ?>