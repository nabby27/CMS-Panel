<div class="container">
    <h1 class="page-header">
        <?php echo $category->getId() != null ? $category->getId() : 'New category'; ?>
    </h1>

    <form class="border border-info rounded p-4" action="<?php echo Settings::PATH['base'] ?>/category/save" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $category->getId(); ?>" />

        <fieldset class="border border-black px-3 pb-3 mb-4">
            <legend>Category data</legend>
            
            <div class="form-group py-2">
            <label class="d-none d-lg-block" for="idCategoryFather">Category father:</label>
            <select name="idCategoryFather" class="form-control custom-select" required <?php if ($category->getId() == 1 ) echo 'disabled' ?>>
                <option value="" disabled selected>Choose...</option>
                <?php foreach($this->getAll() as $categoryFather): ?>
                    <option value="<?php echo $categoryFather->getId(); ?>" <?php if ($categoryFather->getId() == $category->getIdCategoryFather()) echo 'selected'; ?> >
                        <?php echo ucfirst($categoryFather->getName()); ?> 
                    </option>
                <?php endforeach; ?>
            </select>
            </div>
            
            <div class="form-group py-2">
                <label class="d-none d-lg-block" for="name">Name:</label>
                <input type="text" name="name" value="<?php echo ucfirst($category->getName()); ?>" class="form-control" placeholder="Name" required>
            </div>
        </fieldset>
            
        <div class="text-right pt-3">
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>
</div>