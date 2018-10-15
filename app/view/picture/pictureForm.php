<h1 class="page-header">
    <?php echo $picture->getId() != null ? $picture->getId() : 'New picture'; ?>
</h1>

<form action="?c=picture&a=save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $picture->getId(); ?>" />

    <div class="form-group">
        <label>Picture:</label>
        <?php if ($picture->getId() != null) { ?>
            <img src="<?php echo Settings::PATH['img'].'/'.$picture->getPicture(); ?>" class="img-fluid mb-1" alt="image">
        <?php } ?>
        <div class="custom-file">
            <input type="file" name="picture" class="custom-file-input" required>
            <label class="custom-file-label"><?php echo ($picture->getId() != null) ? $picture->getPicture() : 'Choose file'; ?></label>
        </div>
    </div>

    <div class="form-group">
        <label>Descriptión:</label>
        <textarea class="form-control" rows="6" name="description" placeholder="Describe the picture here..."><?php echo $picture->getDescription(); ?></textarea>
    </div>

    <div class="form-group">
      <label>Article:</label>
      <select name="idArticle" class="form-control" required>
        <option value="" disabled selected>Choose...</option>
        <?php foreach($this->articleModel->getAll() as $article): ?>
            <option value="<?php echo $article->getId(); ?>" <?php if ($article->getId() == $picture->getIdArticle()) echo 'selected'; ?> >
                <?php echo $article->getName(); ?> 
            </option>
        <?php endforeach; ?>
      </select>
    </div>
   
    <hr/>
    
    <div class="text-right">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
