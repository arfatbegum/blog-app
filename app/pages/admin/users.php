<div class="d-flex justify-content-between mb-3">
    <h3 class="fw-bold">All Users</h3>
    <button class="btn-dark rounded px-3"><i class="bi bi-person-plus"></i> Add User</button>
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