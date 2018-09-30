<table class="table table-hover">
    <thead class="thead-light">
        <th>ID</th><th>NAME</th><th>SURNAME</th><th>EMAIL</th><th>TELEPHONE</th><th>ADDRESS</th><th>PASSWORD</th><th>TYPE USER</th>
        <th><i class="far fa-edit"></i></th>
        <th><i class="fas fa-trash-alt"></i></th>
        <th><a class="btn btn-primary" href="?c=user&a=create">Create</a></th>
    </thead>
    <?php foreach($this->getAll() as $r): ?>
        <tr>
            <td><?php echo $r->id; ?></td>
            <td><?php echo $r->name; ?></td>
            <td><?php echo $r->surname; ?></td>
            <td><?php echo $r->email; ?></td>
            <td><?php echo $r->telephon; ?></td>
            <td><?php echo $r->address; ?></td>
            <td><?php echo $r->password; ?></td>
            <?php foreach($this->typeUserModel->getAll() as $s): ?>
                <?php if ($s->id == $r->idType) echo "<td>".$s->typeUser."</td>"; ?>
            <?php endforeach; ?>

            <td>
                <a class="btn btn-warning" href="?c=user&a=edit&id=<?php echo $r->id; ?>">Edit</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('Do you want delete this user?');" href="?c=user&a=delete&id=<?php echo $r->id; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>