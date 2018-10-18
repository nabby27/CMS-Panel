<h1 class="page-header">
    <?php echo $article->getId() != null ? $article->getId() : 'New article'; ?>
</h1>

<form class="border border-primary rounded p-4" action="?c=article&a=save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $article->getId(); ?>" />

    <fieldset class="border border-black px-3 pb-3">
        <legend>Article data</legend>
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $article->getName(); ?>" class="form-control" placeholder="Name" required>
        </div>
        
        <div class="form-group">
            <label>Descriptión:</label>
            <textarea class="form-control" rows="6" name="description" placeholder="Describe the article here..."><?php echo $article->getDescription(); ?></textarea>
        </div>

        <div class="form-group">
            <label>Picture:</label>
            <?php if ($article->getId() != null) { ?>
                <img src="<?php echo Settings::PATH['img'].'/'.$article->getPicture(); ?>" class="img-fluid" alt="image">
            <?php } ?>
            <div class="custom-file">
                <input type="file" name="picture" class="custom-file-input" <?php if ($article->getId() == null) echo required ?> >
                <label class="custom-file-label"><?php echo ($article->getId() != null) ? $article->getPicture() : 'Choose file'; ?></label>
            </div>
        </div>

        <div class="form-group">
        <label>Category:</label>
        <select name="idCategory" class="form-control" required>
            <option value="" disabled selected>Choose...</option>
            <?php foreach($this->categoryModel->getAll() as $category): ?>
                <option value="<?php echo $category->getId(); ?>" <?php if ($category->getId() == $article->getIdCategory()) echo 'selected'; ?> >
                    <?php echo $category->getName(); ?> 
                </option>
            <?php endforeach; ?>
        </select>
        </div>
    </fieldset>
   
    <hr/>
    
    <div class="text-right">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
