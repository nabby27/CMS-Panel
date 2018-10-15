<h1 class="page-header">
    <?php echo $picture->getId() != null ? $picture->getId() : 'New picture'; ?>
</h1>

<form action="?c=picture&a=save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $picture->getId(); ?>" />

    <img src="<?php echo Settings::PATH['img'].'/'.$picture->getPicture(); ?>" class="img-fluid mb-1" alt="image">
    <div class="custom-file">
        <label>Picture:</label>
        <input type="file" name="picture" class="custom-file-input">
        <label class="custom-file-label"><?php echo ($picture->getId() != null) ? $picture->getPicture() : 'Choose file'; ?></label>
    </div>

    <div class="form-group">
        <label>Descriptión:</label>
        <textarea class="form-control" rows="6" name="description" placeholder="Describe yourself here..."><?php echo $picture->getDescription(); ?></textarea>
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
