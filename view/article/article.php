<table class="table table-hover">
    <thead class="thead-light">
        <th>ID</th><th>NAME</th><th>DESCRIPTION</th><th>PICTURE</th><th>CATEGORY</th>
        <th><i class="far fa-edit"></i></th>
        <th><i class="fas fa-trash-alt"></i></th>
        <th><a class="btn btn-primary" href="?c=article&a=create">Create</a></th>
    </thead>
    <?php foreach($this->getAll() as $r): ?>
        <tr>
            <td><?php echo $r->id; ?></td>
            <td><?php echo $r->name; ?></td>
            <td><?php echo $r->description; ?></td>
            <td><?php echo $r->picture; ?></td>
            <?php foreach($this->categoryModel->getAll() as $s): ?>
                <?php if ($s->id == $r->idCategory) echo "<td>".$s->name."</td>"; ?>
            <?php endforeach; ?>

            <td>
                <a class="btn btn-warning" href="?c=article&a=edit&id=<?php echo $r->id; ?>">Edit</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('Do you want delete this article?');" href="?c=article&a=delete&id=<?php echo $r->id; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>