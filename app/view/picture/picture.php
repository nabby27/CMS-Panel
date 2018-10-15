<a class="btn btn-primary text-center" href="?c=picture&a=create"><i class="fas fa-plus"></i> Create</a>
<hr/>
<table class="table table-hover">
    <thead class="thead-light">
        <th class="text-center">ID</th><th class="text-center">PICTURE</th><th class="text-center">DESCRIPTION</th>
            <th class="text-center">ARTICLE</th>
        <th class="text-center"><i class="far fa-edit"></i></th>
        <th class="text-center"><i class="fas fa-trash-alt"></i></th>
    </thead>
    <?php foreach($pictures as $picture): ?>
        <tr>
            <td class="text-center"><?php echo $picture->getId(); ?></td>
            <td class="text-center"><?php echo $picture->getPicture(); ?></td>
            <td class="text-center"><?php echo $picture->getDescription(); ?></td>
            <?php foreach($this->articleModel->getAll() as $article): ?>
                <?php if ($article->getId() == $picture->getIdArticle()) echo "<td class='text-center'>".$article->getName()."</td>"; ?>
            <?php endforeach; ?>

            <td class="text-center">
                <a class="btn btn-warning" href="?c=picture&a=edit&id=<?php echo $picture->getId(); ?>">Edit</a>
            </td>
            <td class="text-center">
                <a class="btn btn-danger" onclick="javascript:return confirm('Do you want delete this picture?');" href="?c=picture&a=delete&id=<?php echo $picture->getId(); ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
