<a class="btn btn-primary text-center" href="?c=category&a=create"><i class="fas fa-plus"></i> Create</a>
<hr/>
<table class="table table-hover">
    <thead class="thead-light">
        <th class="text-center">ID</th><th class="text-center">FATHER CATEGORY</th><th class="text-center">NAME</th>
        <th class="text-center"><i class="far fa-edit"></i></th>
        <th class="text-center"><i class="fas fa-trash-alt"></i></th>
    </thead>
    <?php foreach($this->getAll() as $category): ?>
        <tr class="<?php if ($category->getId() < 2) echo 'bg-light'?>">
            <td class="text-center"><?php echo $category->getId(); ?></td>
            <?php foreach($this->getAll() as $categoryFather): ?>
                <?php if ($categoryFather->getId() == $category->getIdCategoryFather()) echo "<td class='text-center'>".$categoryFather->getName()."</td>"; ?>
            <?php endforeach; ?>
            <td class="text-center"><?php echo $category->getName(); ?></td>
           
            <td class="text-center">
                <a class="btn btn-warning" href="?c=category&a=edit&id=<?php echo $category->getId(); ?>">Edit</a>
            </td>
            <td class="text-center">
                <a class="btn btn-danger <?php if ($category->getId() < 2) echo 'disabled'?>" onclick="javascript:return confirm('Do you want delete this category?');" href="?c=category&a=delete&id=<?php echo $category->getId(); ?>">Delete</a>
            </td>

        </tr>
    <?php endforeach; ?>
</table>
