<h1 class="page-header">
    <?php echo $article->getId() != null ? $article->getId() : 'New article'; ?>
</h1>

<form id="frm-article" action="?c=article&a=save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $article->getId(); ?>" />
      
    <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $article->getName(); ?>" class="form-control" placeholder="Name" required>
    </div>
    
    <div class="form-group">
        <label>Descriptión:</label>
        <textarea class="form-control" rows="6" name="description" placeholder="Describe new article here..."><?php echo $article->getDescription(); ?></textarea>
    </div>

    <div class="form-group">
        <label>Picture:</label>
        <input type="text" name="picture" value="<?php echo $article->getPicture(); ?>" class="form-control" placeholder="Picture" required>
    </div>

    <div class="form-group">
      <label for="inputCategory">Category:</label>
      <select id="inputCategory" name="idCategory" class="form-control" required>
        <option value="" disabled selected>Choose...</option>
        <?php foreach($this->categoryModel->getAll() as $category): ?>
            <option  value="<?php echo $category->getId(); ?>" <?php if ($category->getId() == $article->getId()) echo 'selected'; ?> >
                <?php echo $category->getName(); ?> 
            </option>
        <?php endforeach; ?>
      </select>
    </div>
   
    <hr/>
    
    <div class="text-right">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
