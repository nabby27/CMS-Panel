<h1 class="page-header">
    <?php echo $category->getId() != null ? $category->getId() : 'New category'; ?>
</h1>

<form action="?c=category&a=save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $category->getId(); ?>" />

    <div class="form-group">
      <label>Category father:</label>
      <select name="idCategoryFather" class="form-control" required>
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
   
    <hr/>
    
    <div class="text-right">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
