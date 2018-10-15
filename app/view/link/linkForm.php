<h1 class="page-header">
    <?php echo $link->getId() != 0 ? $link->getId() : 'New link'; ?>
</h1>

<form action="?c=link&a=save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $link->getId(); ?>" />
    
    <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $link->getName(); ?>" class="form-control" placeholder="Name" required>
    </div>

    <div class="form-group">
        <label>Link:</label>
        <input type="text" name="link" value="<?php echo $link->getLink(); ?>" class="form-control" placeholder="Link" required>
    </div>

    <div class="form-group">
      <label>Article:</label>
      <select name="idArticle" class="form-control" required>
        <option value="" disabled selected>Choose...</option>
        <?php foreach($this->articleModel->getAll() as $article): ?>
            <option value="<?php echo $article->getId(); ?>" <?php if ($article->getId() == $link->getIdArticle()) echo 'selected'; ?> >
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
