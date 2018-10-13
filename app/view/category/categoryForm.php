<h1 class="page-header">
    <?php echo $category->getId() != null ? $category->getId() : 'New category'; ?>
</h1>

<form id="frm-category" action="?c=category&a=save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $category->getId(); ?>" />

    <div class="form-group">
      <label for="inputCategoryFather">Category father:</label>
      <select id="inputCategoryFather" name="idCategoryFather" class="form-control" required>
        <option value="" disabled selected>Choose...</option>
        <?php foreach($this->getAll() as $category2): ?>
            <option value="<?php echo $category2->getId(); ?>" <?php if ($category2->getId() == $category->getIdCategoryFather()) echo 'selected'; ?> >
                <?php echo $category2->getName(); ?> 
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
