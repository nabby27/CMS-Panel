<table class="table table-hover">
    <thead class="thead-light">
        <th>ID</th><th>NAME</th><th>LINK</th><th>ARTICLE</th>
        <th><i class="far fa-edit"></i></th>
        <th><i class="fas fa-trash-alt"></i></th>
        <th><a class="btn btn-primary" href="?c=link&a=create">Create</a></th>
    </thead>
    <?php foreach($this->getAll() as $r): ?>
        <tr>
            <td><?php echo $r->id; ?></td>
            <td><?php echo $r->name; ?></td>
            <td><?php echo $r->link; ?></td>
            <?php foreach($this->articleModel->getAll() as $s): ?>
                <?php if ($s->id == $r->idArticle) echo "<td>".$s->name."</td>"; ?>
            <?php endforeach; ?>

            <td>
                <a class="btn btn-warning" href="?c=link&a=edit&id=<?php echo $r->id; ?>">Edit</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('Do you want delete this link?');" href="?c=link&a=delete&id=<?php echo $r->id; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
