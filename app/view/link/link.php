<table class="table table-hover">
    <thead class="thead-light">
        <th class="text-center">ID</th><th class="text-center">NAME</th><th class="text-center">LINK</th>
            <th class="text-center">ARTICLE</th>
        <th class="text-center"><i class="far fa-edit"></i></th>
        <th class="text-center"><i class="fas fa-trash-alt"></i></th>
        <th class="text-center"><a class="btn btn-primary" href="?c=link&a=create"><i class="fas fa-plus"></i> Create</a></th>
    </thead>
    <?php foreach($this->getAll() as $link): ?>
        <tr>
            <td class="text-center"><?php echo $link->getId(); ?></td>
            <td class="text-center"><?php echo $link->getName(); ?></td>
            <td class="text-center"><?php echo $link->getLink(); ?></td>
            <?php foreach($this->articleModel->getAll() as $article): ?>
                <?php if ($article->getId() == $link->getIdArticle()) echo "<td class='text-center'>".$article->getName()."</td>"; ?>
            <?php endforeach; ?>

            <td class="text-center">
                <a class="btn btn-warning" href="?c=link&a=edit&id=<?php echo $link->getId(); ?>">Edit</a>
            </td>
            <td class="text-center">
                <a class="btn btn-danger" onclick="javascript:return confirm('Do you want delete this link?');" href="?c=link&a=delete&id=<?php echo $link->getId(); ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
