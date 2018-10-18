<h1 class="page-header">
    <?php echo $category->getId() != null ? $category->getId() : 'New category'; ?>
</h1>

<form class="border border-primary rounded p-4" action="<?php echo Settings::PATH['base'] ?>/category/save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $category->getId(); ?>" />

    <fieldset class="border border-black px-3 pb-3 mb-4">
        <legend>Category data</legend>
        
        <div class="form-group">
        <label>Category father:</label>
        <select name="idCategoryFather" class="form-control" required <?php if ($category->getId() == 1 ) echo 'disabled' ?>>
            <option value="" disabled selected>Choose...</option>
            <?php foreach($this->getAll() as $categoryFather): ?>
                <option value="<?php echo $categoryFather->getId(); ?>" <?php if ($categoryFather->getId() == $category->getIdCategoryFather()) echo 'selected'; ?> >
                    <?php echo $categoryFather->getName(); ?> 
                </option>
            <?php endforeach; ?>
        </select>
        </div>
        
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $category->getName(); ?>" class="form-control" placeholder="Name" required>
        </div>
    </fieldset>
   
    <hr/>
    
    <div class="text-right">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
