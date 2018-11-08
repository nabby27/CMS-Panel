<a class="btn btn-primary text-center" href="<?php echo Settings::PATH['base'] ?>/category/create">
    <i class="fas fa-plus"></i> Create
</a>
<hr/>
<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <th class="text-center"><i class="fas fa-trash-alt"></i></th>
            <th class="text-center"><i class="far fa-edit"></i></th>
            <th class="text-center"><i class="fas fa-file-invoice"></i></th>
            <th class="text-center">ID</th><th class="text-center">FATHER CATEGORY</th><th class="text-center">NAME</th>
        </thead>
        <?php if ($categories != null) { ?>
            <?php foreach($categories as $category): ?>
                <tr class="<?php if ($category->getId() < 2) echo 'bg-light'?>">
                    <td class="text-center">
                        <a class="btn btn-danger <?php if ($category->getId() < 2) echo 'disabled'?>" onclick="javascript:return confirm('Do you want delete this category?');" href="<?php echo Settings::PATH['base'] ?>/category/delete/<?php echo $category->getId(); ?>">Delete</a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-warning" href="<?php echo Settings::PATH['base'] ?>/category/edit/<?php echo $category->getId(); ?>">Edit</a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-info" href="<?php echo Settings::PATH['base'] ?>/article/list/category/<?php echo $category->getId(); ?>">Articles</a>
                    </td>
                    <td class="text-center"><?php echo $category->getId(); ?></td>
                    <?php foreach($categories as $categoryFather): ?>
                        <?php if ($categoryFather->getId() == $category->getIdCategoryFather()) echo "<td class='text-center'>".ucfirst($categoryFather->getName())."</td>"; ?>
                    <?php endforeach; ?>
                    <td class="text-center"><?php echo ucfirst($category->getName()); ?></td>
                

                </tr>
            <?php endforeach; ?>
        <?php } else { ?>
            <tr>
                <td colspan="6" class="text-center text-info bg-light"> THERE ARE NO RECORDS </td>
            </tr>
        <?php } ?>
    </table>
</div>