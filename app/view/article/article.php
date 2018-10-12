<table class="table table-hover">
    <thead class="thead-light">
        <th class="text-center">ID</th><th class="text-center">NAME</th><th class="text-center">DESCRIPTION</th>
            <th class="text-center">PICTURE</th><th class="text-center">CATEGORY</th>
        <th class="text-center"><i class="far fa-edit"></i></th>
        <th class="text-center"><i class="fas fa-trash-alt"></i></th>
        <th class="text-center"><a class="btn btn-primary" href="?c=article&a=create"><i class="fas fa-plus"></i> Create</a></th>
    </thead>
    <?php foreach($this->getAll() as $article): ?>
        <tr>
            <td class="text-center"><?php echo $article->getId(); ?></td>
            <td class="text-center"><?php echo $article->getName(); ?></td>
            <td class="text-center"><?php echo $article->getDescription(); ?></td>
            <td class="text-center"><?php echo $article->getPicture(); ?></td>
            <?php foreach($this->categoryModel->getAll() as $category): ?>
                <?php if ($category->getId() == $article->getIdCategory()) echo "<td>".$category->getName()."</td>"; ?>
            <?php endforeach; ?>

            <td class="text-center">
                <a class="btn btn-warning" href="?c=article&a=edit&id=<?php echo $article->getId(); ?>">Edit</a>
            </td>
            <td class="text-center">
                <a class="btn btn-danger" onclick="javascript:return confirm('Do you want delete this article?');" href="?c=article&a=delete&id=<?php echo $article->getId(); ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>