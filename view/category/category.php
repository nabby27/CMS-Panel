<table class="table table-hover">
    <thead class="thead-light">
        <th>ID</th><th>FATHER CATEGORY</th><th>NAME</th>
        <th><i class="far fa-edit"></i></th>
        <th><i class="fas fa-trash-alt"></i></th>
        <th><a class="btn btn-primary" href="?c=category&a=create">Create</a></th>
    </thead>
    <?php foreach($this->getAll() as $r): ?>
        <tr>
            <td><?php echo $r->id; ?></td>
            <?php foreach($this->getAll() as $s): ?>
                <?php if ($s->id == $r->idCategoryFather) echo "<td>".$s->name."</td>"; ?>
            <?php endforeach; ?>
            <td><?php echo $r->name; ?></td>

            <td>
                <a class="btn btn-warning" href="?c=category&a=edit&id=<?php echo $r->id; ?>">Edit</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('Do you want delete this category?');" href="?c=category&a=delete&id=<?php echo $r->id; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
